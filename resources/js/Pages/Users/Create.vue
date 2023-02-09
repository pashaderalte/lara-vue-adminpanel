<template>
    <Head :title="title" />

    <header class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg my-10 rounded">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Add user
            </h1>
        </div>
    </header>

    <Link :href="route('users.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Back
    </Link>

    <form @submit.prevent="store">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input :class="{'border-red-500': form.errors.name}" v-model="form.name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded py-1">

                        <div v-if="form.errors.name" class="text-red-500 mt-2">{{ form.errors.name }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input :class="{'border-red-500': form.errors.email}" v-model="form.email" type="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded py-1">

                        <div v-if="form.errors.email" class="text-red-500 mt-2">{{ form.errors.email }}</div>
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input :class="{'border-red-500': form.errors.password}" v-model="form.password " type="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded py-1">

                        <div v-if="form.errors.password" class="text-red-500 mt-2">{{ form.errors.password }}</div>
                    </div>

                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import {Head, Link, useForm} from '@inertiajs/vue3';

export default {
    components: {
        Link,
        Head
    },
    props: {
        title: String,
    },
    setup() {
        const form = useForm({
            name: null,
            email: null,
            password: null
        })

        function store() {
            //??? why not this.route
            form.post(route('users.store'))
        }

        return {form, store}
    },


};
</script>
