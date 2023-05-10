<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register"/>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name"/>

                <TextInput
                    id="name"
                    v-model="form.name"
                    class="mt-1 block w-full"
                    autocomplete="name"
                    required
                    autofocus
                    type="text"
                />

                <InputError :message="form.errors.name" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email"/>

                <TextInput
                    id="email"
                    v-model="form.email"
                    class="mt-1 block w-full"
                    autocomplete="username"
                    required
                    type="email"
                />

                <InputError :message="form.errors.email" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password"/>

                <TextInput
                    id="password"
                    v-model="form.password"
                    class="mt-1 block w-full"
                    autocomplete="new-password"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password" class="mt-2"/>
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password"/>

                <TextInput
                    id="password_confirmation"
                    autocomplete="new-password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    type="password"
                />

                <InputError :message="form.errors.password_confirmation" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Already registered?
                </Link>

                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="ml-4">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
