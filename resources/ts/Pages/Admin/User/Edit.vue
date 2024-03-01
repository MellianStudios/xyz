<template>
    <AuthenticatedLayout>
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2 p-6">
                <form @submit="onSubmit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <ValidatedInput name="email" type="email" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="first_name" value="First name" />
                        <ValidatedInput name="first_name" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="last_name" value="Last name" />
                        <ValidatedInput name="last_name" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="street" value="Street" />
                        <ValidatedInput name="street" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="street_number" value="Street number" />
                        <ValidatedInput name="street_number" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="zip" value="Postal code" />
                        <ValidatedInput name="zip" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="city" value="City" />
                        <ValidatedInput name="city" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="country" value="Country" />
                        <ValidatedInput name="country" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="phone_number" value="Phone number" />
                        <ValidatedInput name="phone_number" class="mt-1 w-full" />
                    </div>
                    <div class="mt-4 text-gray-200">
                        <InputLabel for="file" value="File" />
                        <input type="file" @input="file = $event.target.files[0]" />
                        {{ errors?.file }}
                    </div>
                    <PrimaryButton class="mt-4">Update</PrimaryButton>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import { useForm } from 'vee-validate';
import { ref, toRaw } from 'vue';
import * as yup from 'yup';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ValidatedInput from '@/Components/ValidatedInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import type { User } from '@/types/models';

const props = defineProps<{ user: User; errors: object }>();

const { handleSubmit, setFieldError, setErrors } = useForm({
    validationSchema: yup.object({
        email: yup.string().required().email(),
        first_name: yup.string().required(),
        last_name: yup.string().required(),
        street: yup.string().nullable(),
        street_number: yup.string().nullable(),
        zip: yup.string().nullable(),
        city: yup.string().nullable(),
        country: yup.string().nullable(),
        phone_number: yup.string().nullable(),
    }),
    initialValues: props.user,
});

const file = ref(null);

const onSubmit = handleSubmit((values) => {
    values._method = 'put';
    values.file = file.value;

    router.post(route('admin.users.update', props.user.id), values, {
        onError: (visit) => setErrors(toRaw(props.errors)),
    });
});
</script>

<style scoped></style>
