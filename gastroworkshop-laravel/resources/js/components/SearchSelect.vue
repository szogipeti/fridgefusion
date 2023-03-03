<template>


<div class="select-box">
    <div class="selected" @click="toggleActive">
        {{selected===""?defaultLabel:selected}}
        <font-awesome-icon v-if="!active" icon="fa-solid fa-chevron-down" />
        <font-awesome-icon v-else icon="fa-solid fa-chevron-up" />
    </div>
    <div class="options-container" v-bind:class="active?'active':''">
        <select-option @setSelected="setSelected" v-for="item in items" :key="item.id" :id="category + '-' + item.id" :label="item.name" :category="category" :display="item.display??'block'" />
    </div>
    <div class="search-box">
        <input ref="search" type="text" placeholder="Start Typing..." v-model="searchTerm">
    </div>
</div>

</template>

<script>
import SelectOption from "./SelectOption.vue";
export default {
    name: "SearchSelect",
    components:{
        SelectOption
    },
    data(){
        return{
            active: false,
            selected: "",
            selectedId: Number,
            searchTerm: "",
        }
    },
    props:{
        items: Array,
        category: String,
        defaultLabel: String
    },
    methods:{
        toggleActive(){
            this.active = !this.active;
            this.searchTerm = "";
            if(this.active){
                this.focusInput();
            }
        },
        setSelected(text, id){
            this.selected = text;
            this.selectedId = id.split("-")[1];
            this.active = false;
            this.$emit('setSelectedInput', this.selectedId);
        },
        filterList(searchTerm){
            searchTerm = searchTerm.toLowerCase();
            this.items.forEach(item => {
                if(item.name.toLowerCase().indexOf(searchTerm) != -1){
                    item.display = "block"
                }else{
                    item.display = "none"
                }
            })
        },
        focusInput(){
            this.$refs.search.focus();
        },
        resetSelected(){
            this.selected = "";
            this.selectedId = null;
            this.$emit('setSelectedInput')
        }
    },
    watch:{
        searchTerm(newTerm, oldTerm){
            this.filterList(newTerm);
        }
    },
    emits:[
        'setSelectedInput'
    ]
}
</script>

<style scoped>
.select-box{
    display: inline-block;
    width: 100%;
    position: relative;
    height: 100%;
}

.select-box .options-container.active{
    max-height: 200px;
    opacity: 1;
    overflow-y: scroll;
    z-index: 1;
    margin-top: 50px;
}


.select-box .options-container{
    max-height: 0;
    width: 100%;
    opacity: 0;
    transition: all 0.4s;
    border-radius: 0 0 8px 8px;
    overflow: hidden;
    position: absolute;
    background: white;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    display: block;

    order: 1;
}

.selected{
    display: flex;
    border-radius: 8px;
    margin-bottom: 8px;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    padding: 0 5px 5px 5px;

    order: 0;
}

.selected::after{
    transition: all 0.4s;
}

.select-box .options-container::-webkit-scrollbar{
    width: 8px;
    background-color: #ddd;
    border-radius: 0 0 8px 0;
    box-shadow: 1px 0 2px 0px #bbb inset;
}

.select-box .options-container::-webkit-scrollbar-thumb{
    background: #888;
    border-radius: 0 8px 8px 0;
}


selected{
    padding: 12px 24px;
    cursor: pointer;
}

.select-box .option:hover{
    background: #ddd;
}

.search-box input{
    width: 100%;
    padding: 12px 16px;
    position: absolute;
    border-radius: 8px 8px 0 0;
    z-index: 100;
    border: 1px solid #ccc;

    opacity: 0;
    pointer-events: none;
    transition: all 0.4s;
}

.search-box input:focus{
    outline: none;
}

.select-box .options-container.active ~ .search-box input{
    opacity: 1;
    pointer-events: auto;
}
</style>
