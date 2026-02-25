<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="min-h-screen bg-[#1E1E1E] text-white flex flex-col">
        <!-- Main content -->
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
