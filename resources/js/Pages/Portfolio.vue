<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import PortfolioHero from '@/Components/Portfolio/PortfolioHero.vue'
import PortfolioAbout from '@/Components/Portfolio/PortfolioAbout.vue'
import PortfolioProjects from '@/Components/Portfolio/PortfolioProjects.vue'
import PortfolioExperience from '@/Components/Portfolio/PortfolioExperience.vue'
import PortfolioContact from '@/Components/Portfolio/PortfolioContact.vue'
</script>

<template>
    <Head title="Portfolio" />
    <AppLayout>
        <!-- Replaced simple portfolio with comprehensive macOS-inspired sections -->
        <PortfolioHero />
        <PortfolioAbout />
        <PortfolioProjects />
        <PortfolioExperience />
        <PortfolioContact />
    </AppLayout>
</template>
