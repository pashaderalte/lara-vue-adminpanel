<template>
    <Head>
        <title>{{ title }}</title>
    </Head>
    <h1 class="grid h-screen place-items-center font-extrabold text-5xl shadow-md">ABOUTLESS</h1>
</template>

<script>
import {Head} from "@inertiajs/vue3";
export default {
    components: {
        Head
    },

    props: {
        title: String
    },
}
</script>

