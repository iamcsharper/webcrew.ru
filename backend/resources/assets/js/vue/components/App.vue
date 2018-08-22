<template>
    <div id="app">
        <transition
                appear
                name="fade"
                mode="out-in"
                :duration="200">
            <router-view/>
        </transition>
        <modals-container></modals-container>
    </div>
</template>