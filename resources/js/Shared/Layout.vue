<template>
    <section class="bg-slate-100 h-screen">
        <nav class="bg-gray-800 shadow-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-14" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Emblema_KGB.svg/800px-Emblema_KGB.svg.png" alt="Best logo">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <Link :href="route('home')" :class="{
                                    'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl ===  'http://127.0.0.1:8000/',
                                    'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl !==  'http://127.0.0.1:8000/'
                                }">Home</Link>

                                <Link :href="route('about')" :class="{
                                    'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl ===  route('about'),
                                    'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl !==  route('about')
                                }">About</Link>

                                <Link :href="route('users.index')" :class="{
                                    'bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl ===  route('users.index'),
                                    'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium' : currentUrl !==  route('users.index')
                                }">Users</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div v-if="$page.props.message" class="bg-lime-400 opacity-50 h-10 flex items-center text-sm font-medium text-lime-900 px-4 sm:px-6 lg:px-8 mx-2.5 my-5 sm:rounded-lg">
            <span class="ml-auto">{{ $page.props.message }}</span>
            <button @click.prevent="$page.props.message = null" class="ml-auto">&times</button>
        </div>

        <div class="container mx-auto">
            <slot />
        </div>
    </section>

</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    components: {
        Link
    },
    data() {
        return {
            currentUrl: ''
        }
    },
    updated() {
        this.currentUrl = window.location.href;
    },
}
</script>


