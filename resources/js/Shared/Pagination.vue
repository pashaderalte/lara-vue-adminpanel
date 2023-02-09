<template>
    <div v-if="links.length > 3" class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ users.from }}</span>
                    to
                    <span class="font-medium">{{ users.to }}</span>
                    of
                    <span class="font-medium">{{ users.total }}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm">

                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a v-for="(link, k) in links"
                       :key=k
                       v-html="link.label"
                       :class="{'relative z-10 inline-flex items-center border px-4 py-2 text-sm font-medium focus:z-20' : true,
                       'border-indigo-500 bg-indigo-50 text-indigo-600' : link.label === String(users.current_page),
                       'border-gray-300 bg-white text-gray-500 hover:bg-gray-50' : link.label !== String(users.current_page)
                       }"
                       :href="link.url"/>
<!--                    <a href="#" class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20">2</a>-->

                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        users: Object,
        links: Array
    }
}
</script>


