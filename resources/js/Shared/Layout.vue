<template>

    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex justify-between">


                <h1 class="font-bold text-lg">My App</h1>

                <p class="text-sm ml-4">Welcome ! {{ $page.props.auth.username }}</p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>

    </section>
</template>

<script>
import Nav from './Nav.vue';
export default {
    components: { Nav },
   
}
</script>