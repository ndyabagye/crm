<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Button} from "@/Components/ui/button";
import {Label} from "@/Components/ui/label";
import {Input} from "@/Components/ui/input";

defineProps<{
  status?: string;
}>();

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = async () => {
  form.post(route('login'), {
    onFinish: () => {
      form.reset('password');
    },
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Sign into your account"/>

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
      {{ status }}
    </div>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 text-left">
        <h1 class="text-3xl font-bold">
          Sign into your account
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your email and password below to sign into your account.
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="email">Email Address</Label>
          <Input
            id="email"
            type="email"
            placeholder="m@example.com"
            v-model="form.email"
            autofocus
            autocomplete="off"
            required
          />
        </div>
        <div class="grid gap-2">
          <Label for="password">Password</Label>

          <Input
            id="password"
            type="password"
            placeholder="super_secret_password"
            v-model="form.password"
            autocomplete="off"
            required
          />
          <Link
            :href="route('password.request')"
            class="ml-auto inline-block text-sm underline"
          >
            Forgot your password?
          </Link>
        </div>
        <Button type="submit" class="w-full">
          Sign in
        </Button>
      </form>
      <div class="mt-4 text-left text-sm">
        Haven't signed up yet?
        <Link :href="route('register')" class="underline">
          Create a new account
        </Link>
      </div>
    </div>
  </GuestLayout>
</template>
