<template>
    <Head :title="title" />

    <header class="bg-white shadow overflow-hidden border-b border-gray-200 sm:rounded-lg my-10 rounded">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Update {{ user.name }}'s (id: {{ user.id }}) info
            </h1>
        </div>
    </header>

    <Link :href="route('users.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Back
    </Link>

    <form @submit.prevent="update">
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

                    <div v-if="form.isDirty" class="flex text-green-500 text-sm py-5 col-span-6">
                        Form had edited don't forget to save changes!
                    </div>

                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update
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
            user: Object
        },
        setup(props) {
            const form = useForm({
                name: props.user.name,
                email: props.user.email,
            })

            function update() {
                //??? why not this.route
                form.put(route('users.update', props.user.id))
            }

            return {form, update}
        },


    };
</script>

