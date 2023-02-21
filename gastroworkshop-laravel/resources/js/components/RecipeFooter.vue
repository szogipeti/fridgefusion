<template>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>About us</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Quick links</h5>
                </div>
                <div class="col">
                    <h5>Quick links</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul>
                        <li>
                            <s-facebook
                                :window-features="windowFeatures"
                                :share-options="shareOptions"
                                :use-native-behavior="useNativeBehavior"
                                @popup-close="onClose"
                                @popup-open="onOpen"
                                @popup-block="onBlock"
                                @popup-focus="onFocus"
                            ></s-facebook>
                        </li>
                        <li></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import { SFacebook } from 'vue-socials'

export default {
    name: 'SFacebookSharing',

    components: { SFacebook },

    data() {
        return {
            windowFeatures: {},
            shareOptions: {
                url: 'https://github.com/',
                quote: 'Quote',
                hashtag: '#Github',
            },
            useNativeBehavior: false,
        }
    },

    methods: {
        onClose() {},
        onOpen() {},
        onBlock() {},
        onFocus() {},
    }
};
</script>

<style scoped>
    footer{
        background-color: #C74545;
    }
    li{
        list-style: none;
    }
    a {
        text-decoration: none;
        width: 100px;
        height: 100px;
    }
</style>
