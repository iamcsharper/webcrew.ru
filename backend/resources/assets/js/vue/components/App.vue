<template>
    <div id="app">
        <transition
                appear
                name="fade"
                mode="out-in"
                :duration="200">
            <router-view/>
        </transition>
    </div>
</template>