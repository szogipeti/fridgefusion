export function authGuard(to,from,next){
    if (!to.meta.requiresAuth) next()
    else {
        if (localStorage.getItem('token') === null) next({name: 'login'})
        else next()
    }
}
