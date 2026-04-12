<script setup lang="ts" xmlns:src="http://www.w3.org/1999/xhtml">
import {Head, Link} from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import {ref, onMounted, onUnmounted, computed} from 'vue'
import ContactForm from '@/Components/ContactForm.vue'

const socials = [
    {
        name: 'GitHub',
        href: 'https://github.com/Hayko97',
        icon: 'M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z'
    },
    {
        name: 'LinkedIn',
        href: 'https://www.linkedin.com/in/hayk-harutyunyan-79a59711b/',
        icon: 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'
    },
]

const skills = [
    {
        name: 'PHP',
        level: 95,
        category: 'Language',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'JavaScript',
        level: 92,
        category: 'Language',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'C#',
        level: 90,
        category: 'Language',
        color: 'from-[var(--color-important)] to-[var(--color-important-300)]'
    },
    {
        name: 'Python',
        level: 88,
        category: 'Language',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'Laravel',
        level: 95,
        category: 'Backend',
        color: 'from-[var(--color-primary)] to-[var(--color-primary-200)]'
    },
    {
        name: 'Vue.js',
        level: 92,
        category: 'Frontend',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'ASP.NET Core',
        level: 90,
        category: 'Backend',
        color: 'from-[var(--color-important)] to-[var(--color-important-300)]'
    },
    {
        name: 'Docker',
        level: 88,
        category: 'DevOps',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'Kubernetes',
        level: 85,
        category: 'DevOps',
        color: 'from-[var(--color-important)] to-[var(--color-important-300)]'
    },
    {name: 'AWS', level: 87, category: 'Cloud', color: 'from-[var(--color-important)] to-[var(--color-important-200)]'},
    {
        name: 'TensorFlow',
        level: 82,
        category: 'AI/ML',
        color: 'from-[var(--color-primary)] to-[var(--color-primary-200)]'
    },
    {name: 'Open AI', level: 80, category: 'AI/ML', color: 'from-[var(--color-primary)] to-[var(--color-primary-200)]'},
    {name: 'Pytorch', level: 78, category: 'AI/ML', color: 'from-[var(--color-primary)] to-[var(--color-primary-200)]'},
    {
        name: 'React and React Native',
        level: 85,
        category: 'Frontend',
        color: 'from-[var(--color-important)] to-[var(--color-important-200)]'
    },
    {
        name: 'Elastic Search',
        level: 75,
        category: 'Backend',
        color: 'from-[var(--color-primary)] to-[var(--color-primary-200)]'
    },
]

const projects = [
    {
        title: 'khsh.fm',
        desc: 'Online pseudo radio player with iOS and Android applications. Includes B2B features for venues, jingle scheduling, and AI music suggestions.',
        tech: ['php', 'iOS', 'laravel', 'AI', 'streaming', 'Vue JS'],
        link: 'https://khsh.fm/',
        image: '/images/khshfm.png',
        color: 'from-[rgb(var(--blue-rgb)/0.1)] to-[rgb(var(--blue-200-rgb)/0.1)]',
    },
    {
        title: 'khsh.fm Applications',
        desc: 'iOS and Android apps for radio‑style music listening.',
        tech: ['iOS', 'Android', 'React Native', 'Mobile'],
        images: [
            '/images/khsh_app_1.PNG',
            '/images/khsh_app_2.PNG',
            '/images/khsh_app_3.PNG',
            '/images/khsh_app_4.PNG',
        ],
        color: 'from-[rgb(var(--yellow-rgb)/0.1)] to-[rgb(var(--yellow-200-rgb)/0.1)]',
    },
    {
        title: 'AI Trading Bot Agent',
        desc: 'Automated trading agent and market analyzer.',
        tech: ['Python', 'AI', 'Trading', 'Automation'],
        images: [
            '/images/bot1.png',
            '/images/bot2.png',
            '/images/bot3.png',
        ],
        color: 'from-[rgb(var(--red-rgb)/0.1)] to-[rgb(var(--red-200-rgb)/0.1)]',
    },
    {
        title: 'License Plate Masker',
        desc: 'Tool for masking license plates in images and video.',
        tech: ['Python', 'OpenCV', 'Computer Vision', 'Image Processing'],
        link: 'https://licenseplatemasker.com/',
        images: [
            '/images/car1.png',
            '/images/car2.png',
            '/images/car3.png',
            '/images/car4.png',
        ],
        color: 'from-[rgb(var(--blue-rgb)/0.1)] to-[rgb(var(--blue-300-rgb)/0.1)]',
    },
    {
        title: 'Media Converter',
        desc: 'Multi-format media converter for audio and video.',
        tech: ['FFmpeg', 'Python'],
        link: 'https://convertmediafree.com/',
        images: [
            '/images/media_converter_1.png',
            '/images/media_converter_2.png',
            '/images/media_converter_3.png',
        ],
        color: 'from-[rgb(var(--blue-rgb)/0.1)] to-[rgb(var(--blue-200-rgb)/0.1)]',
    },
]

// Simple per‑card carousel state (index per project)
const currentSlides = ref<number[]>(projects.map(() => 0))

function nextSlide(cardIndex: number) {
    const imgs = (projects as any)[cardIndex]?.images as string[] | undefined
    if (imgs && imgs.length > 0) {
        currentSlides.value[cardIndex] = (currentSlides.value[cardIndex] + 1) % imgs.length
    }
}

function prevSlide(cardIndex: number) {
    const imgs = (projects as any)[cardIndex]?.images as string[] | undefined
    if (imgs && imgs.length > 0) {
        currentSlides.value[cardIndex] = (currentSlides.value[cardIndex] - 1 + imgs.length) % imgs.length
    }
}

const experience = [
    {
        role: 'Senior Software Engineer - AI Tech Lead',
        company: 'List',
        companyUrl: 'https://list.am',
        period: 'Jan 2024 - Present',
        description: 'Worked on large monolithic system with custom PHP framework. Developed AI-based content moderation tools using OpenAI API. Trained and integrated ML models for category classification and NLP-based moderation.',
    },
    {
        role: 'Senior Software Engineer',
        company: 'Freelancer',
        period: 'Aug 2023 - Jan 2024',
        description: 'Developed sophisticated financial application with .NET Blazor and ASP.NET Core. Led team of five in breaking down monolithic application into microservices. Set up CI/CD pipelines using Bitbucket and AWS.'
    },
    {
        role: 'Senior Software Engineer & Team Lead',
        company: 'Wirestock',
        companyUrl: 'https://wirestock.io',
        period: 'Dec 2019 - Aug 2023',
        description: 'Led and mentored 4-engineer backend team. Implemented Symfony-based microservices with RabbitMQ. Optimized AWS deployments and managed Kubernetes containerization. Created monolithic application using Laravel Forge.',
    },
    {
        role: 'Mid Software Engineer',
        company: 'HelpSystems/Fortra',
        period: 'Jun 2017 - Dec 2019',
        description: 'Initiated cross-platform mobile project from scratch using XAMARIN. Collaborated on RESTful API development using ASP.NET Web API. Utilized diverse .NET technologies to accomplish project goals.',
    },
    {
        role: 'Full Stack Developer',
        company: '4Car',
        period: 'Nov 2016 - Mar 2018',
        description: 'Developed and maintained company website as Full Stack Developer using ASP.NET MVC. Designed responsive user interfaces using Bootstrap and jQuery. Enhanced system reliability and performance.',
    },
]

const activeSection = ref('hero')

type NavItem = { id: string; label: string; number: string }
const navItems: NavItem[] = [
    { id: 'hero', label: 'Hello', number: '01' },
    { id: 'skills', label: 'Expertise', number: '02' },
    { id: 'projects', label: 'Portfolio', number: '03' },
    { id: 'experience', label: 'Career', number: '04' },
    { id: 'contact', label: 'Contact', number: '05' },
]

const sidebarOpen = ref(false)

// Scroll spy
const handleScroll = () => {
    const sections = navItems.map(item => item.id)
    const scrollPosition = window.scrollY + window.innerHeight / 3

    for (let i = sections.length - 1; i >= 0; i--) {
        const section = document.getElementById(sections[i])
        if (section && section.offsetTop <= scrollPosition) {
            activeSection.value = sections[i]
            break
        }
    }
}

const scrollToSection = (sectionId: string) => {
    const element = document.getElementById(sectionId)
    if (element) {
        element.scrollIntoView({behavior: 'smooth', block: 'start'})
        sidebarOpen.value = false
    }
}

// Animation states
const heroVisible = ref(false)
const skillsVisible = ref(false)
const projectsVisible = ref(false)
const experienceVisible = ref(false)

// Typing effect
const typedText = ref('')
const fullText = "Let's translate your ideas to technologies"
let typeIndex = 0

const typeWriter = () => {
    if (typeIndex < fullText.length) {
        typedText.value += fullText.charAt(typeIndex)
        typeIndex++
        setTimeout(typeWriter, 80)
    }
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
    handleScroll()

    setTimeout(typeWriter, 500)

    setTimeout(() => {
        heroVisible.value = true
    }, 100)

    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const sectionId = entry.target.id
                if (sectionId === 'skills') skillsVisible.value = true
                if (sectionId === 'projects') projectsVisible.value = true
                if (sectionId === 'experience') experienceVisible.value = true
            }
        })
    }, observerOptions)

    const sections = ['skills', 'projects', 'experience']
    sections.forEach(id => {
        const element = document.getElementById(id)
        if (element) observer.observe(element)
    })
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})

// Contact form moved into a separate component: ContactForm.vue

const currentSectionInfo = computed(() => {
    const index = navItems.findIndex(item => item.id === activeSection.value)
    const section = navItems[index] ?? navItems[0]
    return {
        ...section,
        index: index >= 0 ? index + 1 : 1,
        total: navItems.length,
    }
})
</script>

<template>
    <Head title="Let's translate your ideas to technologies"/>
    <AppLayout>
        <!-- Light macOS sidebar with electric colors and terminal font -->
        <aside
            :class="['fixed left-0 top-0 h-full w-56 bg-white/95 backdrop-blur-xl border-r border-gray-200 z-50 transition-transform duration-300 lg:translate-x-0 shadow-sm', sidebarOpen ? 'translate-x-0' : '-translate-x-full']">
            <div class="flex flex-col h-full p-6">
                <!-- Header -->
                <div class="mb-8">
                    <!-- CHANGED: Added minimal terminal prompt -->
                    <div class="text-xs font-mono text-gray-400 mb-2">~/portfolio</div>
                    <h2 class="text-lg font-bold"
                        style="font-family: 'SF Mono', Monaco, Menlo, monospace; color: var(--color-important);">
                        Portfolio</h2>
                </div>

                <!-- Navigation items -->
                <nav class="flex-1 space-y-3">
                    <button
                        v-for="item in navItems"
                        :key="item.id"
                        @click="scrollToSection(item.id)"
                        :class="[
              'group relative w-full text-left rounded-xl p-4 transition-all duration-300 hover:scale-[1.02]',
              item.id === 'projects' ? 'bg-gradient-to-br from-[var(--color-primary)] to-[var(--color-primary-200)] text-white shadow-lg shadow-[rgb(var(--blue-rgb)/0.3)]' : 'bg-gray-50 border border-gray-200 text-gray-900 hover:bg-gray-100 hover:border-gray-300',
              activeSection === item.id ? 'shadow-xl scale-[1.02] ring-1 ring-[var(--color-primary)]' : ''
            ]"
                    >
                        <!-- CHANGED: Simplified to just comment style numbers -->
                        <div
                            :class="['text-xs font-mono mb-1', item.id === 'projects' ? 'text-white/80' : 'text-gray-500']"
                            style="font-family: 'SF Mono', Monaco, Menlo, monospace;">// {{ item.number }}
                        </div>
                        <div :class="['text-base font-bold', item.id === 'projects' ? 'text-white' : 'text-gray-900']"
                             style="font-family: 'SF Mono', Monaco, Menlo, monospace;">{{ item.label }}
                        </div>

                        <!-- Active indicator -->
                        <div v-if="activeSection === item.id"
                             :class="['absolute right-3 top-1/2 -translate-y-1/2 w-2 h-2 rounded-full animate-pulse', item.id === 'projects' ? 'bg-white' : 'bg-[var(--color-primary)]']"></div>
                    </button>
                </nav>

                <!-- Footer -->
                <div class="mt-auto pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500 font-mono"
                       style="font-family: 'SF Mono', Monaco, Menlo, monospace;">© 2025 Hayk</p>
                </div>
            </div>
        </aside>

        <!-- Light mobile toggle button -->
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="fixed top-6 left-6 z-50 lg:hidden w-12 h-12 rounded-xl bg-white border border-gray-200 text-gray-900 shadow-lg flex items-center justify-center hover:scale-105 hover:border-[var(--color-secondary)] transition-all"
        >
            <!-- Changed hover border color to yellow -->
            <svg v-if="!sidebarOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg v-else class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Mobile overlay -->
        <div
            v-if="sidebarOpen"
            @click="sidebarOpen = false"
            class="fixed inset-0 bg-gray-900/20 backdrop-blur-sm z-40 lg:hidden"
        ></div>

        <!-- Light main content area -->
        <div class="lg:ml-56">
            <!-- Hero Section -->
            <section id="hero" class="relative isolate overflow-hidden bg-white min-h-screen flex items-center">
                <div
                    class="absolute inset-0 bg-[linear-gradient(to_right,#f0f0f0_1px,transparent_1px),linear-gradient(to_bottom,#f0f0f0_1px,transparent_1px)] bg-[size:2rem_2rem] opacity-40"/>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
                    <div class="grid lg:grid-cols-2 gap-12 items-start">
                        <!-- Headline -->
                        <div
                            :class="['transition-all duration-1000 lg:col-span-2', heroVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                            <!-- CHANGED: Removed code tags, added minimal terminal prompt -->
                            <div class="flex items-center gap-2 text-xs font-mono text-gray-400 mb-4">
                                <span class="text-[var(--color-important)]">$</span>
                                <span>echo "Hayk Harutyunyan"</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs font-mono text-gray-400 mb-4">
                                <span class="text-[var(--color-important)]">$</span>
                                <span>echo "10+ Years in Software Engineering"</span>
                            </div>
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold tracking-tight text-gray-900 leading-tight mb-8"
                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">
                                Let's translate your ideas to technologies
                            </h1>
                        </div>

                        <!-- Overview text -->
                        <div
                            :class="['transition-all duration-1000', heroVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                            <div class="space-y-6 text-lg leading-relaxed text-gray-700">
                                <!-- CHANGED: Added minimal line numbers, removed excessive code tags -->
                                <p class="flex gap-3">
                                    <span class="text-gray-400 font-mono text-sm flex-shrink-0">01</span>
                                    <span>Hi, I'm <span class="font-bold text-gray-900">Hayk</span> — my profession is translating ideas into technology.</span>
                                </p>
                                <p class="flex gap-3">
                                    <span class="text-gray-400 font-mono text-sm flex-shrink-0">02</span>
                                    <span>I've spent years building and leading software projects — from startups to large-scale platforms — always focused on performance, clarity, and reliability.</span>
                                </p>
                                <p class="flex gap-3">
                                    <span class="text-gray-400 font-mono text-sm flex-shrink-0">03</span>
                                    <span>My experience covers frontend (websites and web applications) and backend systems, AI integrations, and scalable architecture — but what matters most to me is building software that people can actually depend on.</span>
                                </p>
                                <p class="flex gap-3">
                                    <span class="text-gray-400 font-mono text-sm flex-shrink-0">04</span>
                                    <span>I care about doing things properly — understanding the goal, writing clean code, and delivering results you can rely on.</span>
                                </p>
                                <p class="flex gap-3">
                                    <span class="text-gray-400 font-mono text-sm flex-shrink-0">05</span>
                                    <span class="font-semibold text-gray-900">Let's build something great — and make it work the way it should.</span>
                                </p>
                            </div>
                        </div>

                        <!-- Photo -->
                        <div
                            :class="['transition-all duration-1000 delay-300', heroVisible ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-8']">
                            <div
                                class="relative aspect-square max-w-[800px] w-full mx-auto rounded-xl overflow-hidden">
                                <img
                                    :src='"/me.png"'
                                    alt="Hayk Harutyunyan"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div
                            :class="['transition-all duration-1000 lg:col-span-2', heroVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                            <div class="mt-10 flex flex-wrap items-center gap-4">
                                <button
                                    @click="scrollToSection('projects')"
                                    class="group inline-flex items-center justify-center gap-2 rounded-xl bg-[var(--color-secondary)] px-8 py-4 text-base font-semibold text-gray-900 shadow-lg shadow-[rgb(var(--yellow-200-rgb)/0.3)] hover:shadow-[rgb(var(--yellow-200-rgb)/0.5)] transition-all duration-300 hover:scale-105"
                                    style="font-family: 'SF Mono', Monaco, Menlo, monospace;"
                                >
                                    <!-- Changed Portfolio button to use yellow gradient as primary color -->
                                    Portfolio
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </button>
                                <button
                                    @click="scrollToSection('contact')"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl border-2 border-gray-300 bg-white px-8 py-4 text-base font-semibold text-gray-900 hover:bg-gray-50 hover:border-[var(--color-important)] transition-all duration-300"
                                    style="font-family: 'SF Mono', Monaco, Menlo, monospace;"
                                >
                                    <!-- Changed hover border to yellow -->
                                    Get in touch
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Light skills section with electric colors -->
            <section id="skills" class="relative bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div
                        :class="['transition-all duration-1000', skillsVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                        <div class="text-center mb-16">
                            <!-- CHANGED: Removed code tags, kept minimal terminal prompt -->
                            <div class="flex items-center justify-center gap-2 text-xs font-mono text-gray-400 mb-3">
                                <span class="text-[var(--color-important)]">$</span>
                                <span>cat skills.json</span>
                            </div>
                            <h2 class="mt-6 text-4xl sm:text-5xl font-bold text-gray-900"
                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Technical Expertise</h2>
                        </div>

                        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div
                                v-for="(skill, index) in skills"
                                :key="skill.name"
                                :class="['group relative rounded-xl bg-white border border-gray-200 shadow-md hover:shadow-xl overflow-hidden transition-all duration-500 hover:-translate-y-2', skillsVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']"
                                :style="{ transitionDelay: `${index * 50}ms` }"
                            >
                                <div class="p-6">
                                    <!-- CHANGED: Kept comment style for category -->
                                    <span
                                        class="inline-block px-2.5 py-1 text-xs font-mono text-gray-600 bg-gray-100 rounded-md border border-gray-200"
                                        style="font-family: 'SF Mono', Monaco, Menlo, monospace;">// {{
                                            skill.category
                                        }}</span>
                                    <!-- CHANGED: Removed code tags from skill name -->
                                    <h3 class="mt-4 text-xl font-bold text-gray-900"
                                        style="font-family: 'SF Mono', Monaco, Menlo, monospace;">{{ skill.name }}</h3>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Light projects section with macOS window style -->
            <section id="projects" class="relative bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div
                        :class="['transition-all duration-1000', projectsVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                        <div class="flex items-end justify-between mb-16">
                            <div>
                                <!-- CHANGED: Simplified terminal command, removed code tags -->
                                <div class="flex items-center gap-2 text-xs font-mono text-gray-400 mb-3">
                                    <span class="text-[var(--color-important)]">$</span>
                                    <span>ls ~/projects</span>
                                </div>
                                <h2 class="mt-6 text-4xl sm:text-5xl font-bold text-gray-900"
                                    style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Selected Projects</h2>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <article
                                v-for="(project, index) in projects"
                                :key="project.title"
                                :class="['group relative rounded-xl bg-white border border-gray-200 shadow-md hover:shadow-xl overflow-hidden transition-all duration-500 hover:-translate-y-2', projectsVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']"
                                :style="{ transitionDelay: `${index * 100}ms` }"
                            >
                                <!-- macOS window header with traffic lights -->
                                <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border-b border-gray-200">
                                    <div class="flex gap-1.5">
                                        <div
                                            class="w-2.5 h-2.5 rounded-full bg-[var(--color-primary)] group-hover:shadow-md group-hover:shadow-[rgb(var(--blue-rgb)/0.5)] transition-shadow"></div>
                                        <div
                                            class="w-2.5 h-2.5 rounded-full bg-[var(--color-secondary)] group-hover:shadow-md group-hover:shadow-[rgb(var(--yellow-rgb)/0.5)] transition-shadow"></div>
                                        <div
                                            class="w-2.5 h-2.5 rounded-full bg-[var(--color-important)] group-hover:shadow-md group-hover:shadow-[rgb(var(--blue-rgb)/0.5)] transition-shadow"></div>
                                    </div>
                                    <!-- CHANGED: Kept terminal path style -->
                                    <span class="ml-2 text-xs font-mono text-gray-500 truncate"
                                          style="font-family: 'SF Mono', Monaco, Menlo, monospace;">~/{{
                                            project.title.toLowerCase().replace(/\s+/g, '-')
                                        }}</span>
                                </div>

                                <!-- Project media: single image or carousel -->
                                <div class="relative aspect-video overflow-hidden bg-gray-100">
                                    <!-- Carousel when images array is provided -->
                                    <template v-if="project.images && project.images.length">
                                        <img
                                            :src="project.images[currentSlides[index]]"
                                            :alt="`${project.title} screenshot ${currentSlides[index] + 1}`"
                                            class="absolute inset-0 w-full h-full object-contain object-center transition-all duration-500"
                                        />

                                        <!-- Prev/Next controls -->
                                        <button
                                            v-if="project.images.length > 1"
                                            type="button"
                                            @click.stop="prevSlide(index)"
                                            class="absolute z-10 left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center shadow-md ring-1 ring-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)]"
                                            aria-label="Previous image"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                                <path d="M15 18l-6-6 6-6"/>
                                            </svg>
                                        </button>
                                        <button
                                            v-if="project.images.length > 1"
                                            type="button"
                                            @click.stop="nextSlide(index)"
                                            class="absolute z-10 right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center shadow-md ring-1 ring-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)]"
                                            aria-label="Next image"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                                <path d="M9 18l6-6-6-6"/>
                                            </svg>
                                        </button>

                                        <!-- Dots -->
                                        <div
                                            v-if="project.images.length > 1"
                                            class="absolute z-10 bottom-3 sm:bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2"
                                        >
                                            <button
                                                v-for="(img, i2) in project.images"
                                                :key="i2"
                                                type="button"
                                                @click.stop="currentSlides[index] = i2"
                                                :aria-label="`Slide ${i2 + 1}`"
                                                class="w-2.5 h-2.5 rounded-full transition-colors ring-1 ring-inset ring-gray-300/60"
                                                :aria-current="i2 === currentSlides[index] ? 'true' : 'false'"
                                                :class="i2 === currentSlides[index] ? 'bg-gray-900 ring-gray-900' : 'bg-gray-300/80 hover:bg-gray-400'"
                                            />
                                        </div>
                                    </template>

                                    <!-- Fallback: single image if provided -->
                                    <template v-else-if="project.image">
                                        <img :src="project.image" :alt="project.title"
                                             class="absolute inset-0 w-full h-full object-contain object-center transition-all duration-500"/>
                                    </template>
                                    <!-- If no image at all, keep empty area (no default image requested) -->
                                </div>

                                <!-- Project content -->
                                <div class="p-6">
                                    <!-- CHANGED: Removed code tags from title -->
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-[var(--color-important)] transition-colors"
                                        style="font-family: 'SF Mono', Monaco, Menlo, monospace;">{{
                                            project.title
                                        }}</h3>
                                    <p class="mt-3 text-sm leading-relaxed text-gray-600">{{ project.desc }}</p>

                                    <!-- Tech stack -->
                                    <div class="mt-5 flex flex-wrap gap-2">
                                        <!-- CHANGED: Kept comment style for tech tags -->
                                        <span v-for="tech in project.tech" :key="tech"
                                              class="px-3 py-1 text-xs font-mono rounded-full bg-gray-100 text-gray-700 border border-gray-200"
                                              style="font-family: 'SF Mono', Monaco, Menlo, monospace;">
                      // {{ tech }}
                    </span>
                                    </div>

                                    <!-- Link -->
                                    <a v-if="project.link" :href="project.link" target="_blank" rel="noopener noreferrer"
                                       class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-gray-900 hover:text-[var(--color-important)] transition-colors group/link">
                                        <span class="text-[var(--color-important)]">→</span> View project
                                    </a>
                                </div>

                                <!-- Bottom accent -->
                                <div
                                    class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-[var(--color-secondary)] via-[var(--color-secondary-200)] to-[var(--color-secondary)] transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500"></div>
                            </article>
                        </div>
                        <div class="mt-10 text-center">
                            <a href="https://github.com/Hayko97" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 text-sm font-semibold text-gray-900 hover:text-[var(--color-important)] transition-colors">
                                <span class="text-[var(--color-important)]">→</span> View more on GitHub
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Light experience section -->
            <section id="experience" class="relative bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div
                        :class="['transition-all duration-1000', experienceVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8']">
                        <div class="text-center mb-16">
                            <!-- CHANGED: Simplified terminal command, removed code tags -->
                            <div class="flex items-center justify-center gap-2 text-xs font-mono text-gray-400 mb-3">
                                <span class="text-[var(--color-important)]">$</span>
                                <span>git log --oneline</span>
                            </div>
                            <h2 class="mt-6 text-4xl sm:text-5xl font-bold text-gray-900"
                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Work History</h2>
                        </div>

                        <div class="max-w-4xl mx-auto">
                            <div class="relative">
                                <!-- Timeline line -->
                                <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-gray-300"></div>

                                <div class="space-y-10">
                                    <div
                                        v-for="(exp, index) in experience"
                                        :key="exp.company"
                                        :class="['relative pl-10 transition-all duration-700', experienceVisible ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-8']"
                                        :style="{ transitionDelay: `${index * 150}ms` }"
                                    >
                                        <!-- Timeline dot -->
                                        <div
                                            class="absolute left-0 top-2 -translate-x-1/2 w-4 h-4 rounded-full bg-gray-400 ring-4 ring-gray-200 shadow"></div>

                                        <!-- Experience card -->
                                        <div
                                            class="rounded-xl bg-white border border-gray-200 shadow-md hover:shadow-lg overflow-hidden transition-all duration-300 hover:-translate-y-1">
                                            <div class="p-6">
                                                <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                                    <!-- CHANGED: Removed code tags from role -->
                                                    <h3 class="text-xl font-bold text-gray-900"
                                                        style="font-family: 'SF Mono', Monaco, Menlo, monospace;">
                                                        {{ exp.role }}</h3>
                                                    <span
                                                        class="px-3 py-1 text-xs font-mono text-gray-600 bg-gray-100 rounded-full border border-gray-200"
                                                        style="font-family: 'SF Mono', Monaco, Menlo, monospace;">// {{
                                                            exp.period
                                                        }}</span>
                                                </div>
                                                <!-- CHANGED: Kept @ symbol for company -->
                                                <p class="text-base font-semibold text-[var(--color-primary)] mb-4"
                                                   style="font-family: 'SF Mono', Monaco, Menlo, monospace;">
                                                    @
                                                    <template v-if="exp.companyUrl">
                                                        <a :href="exp.companyUrl" target="_blank" rel="noopener noreferrer" class="underline decoration-dotted hover:text-[var(--color-important)]">{{ exp.company }}</a>
                                                    </template>
                                                    <template v-else>
                                                        {{ exp.company }}
                                                    </template>
                                                </p>
                                                <p class="text-sm leading-relaxed text-gray-600">{{
                                                        exp.description
                                                    }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Light CTA section with electric gradient -->
            <section id="free-consultation" class="relative bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div class="relative rounded-2xl bg-white border border-gray-200 overflow-hidden shadow-md">
                        <div class="relative p-10 sm:p-14 lg:p-20">
                            <div class="max-w-3xl">
                                <!-- CHANGED: Simplified terminal command, removed code tags -->
                                <div class="flex items-center gap-2 text-xs font-mono text-gray-400 mb-3">
                                    <span class="text-[var(--color-important)]">$</span>
                                    <span>./book-consultation</span>
                                </div>
                                <h2 class="mt-6 text-4xl sm:text-5xl font-bold text-gray-900"
                                    style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Let's discuss your
                                    project</h2>
                                <p class="mt-6 text-lg leading-relaxed text-gray-700">
                                    Book a quick call to discuss your idea, assess feasibility, and outline next steps.
                                    No commitment required — just a friendly conversation about your vision.
                                </p>
                                <div class="mt-10 flex flex-wrap gap-4">
                                    <a href="https://calendly.com/hharutyunyan97/interview"
                                       target="_blank"
                                       class="inline-flex items-center justify-center gap-2 rounded-xl bg-[var(--color-primary)] px-8 py-4 text-base font-semibold text-white-900 shadow-lg shadow-[rgb(var(--blue-rgb)/0.3)] hover:shadow-[rgb(var(--blue-rgb)/0.5)] transition-all duration-300 hover:scale-105"
                                       style="font-family: 'SF Mono', Monaco, Menlo, monospace;">
                                        Book now
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Light contact section -->
            <section id="contact" class="relative bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div class="max-w-5xl mx-auto">
                        <div class="text-center mb-16">
                            <!-- CHANGED: Simplified terminal command, removed code tags -->
                            <div class="flex items-center justify-center gap-2 text-xs font-mono text-gray-400 mb-3">
                                <span class="text-[var(--color-important)]">$</span>
                                <span>mail -s "New Message"</span>
                            </div>
                            <h2 class="mt-6 text-4xl sm:text-5xl font-bold text-gray-900"
                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Get In Touch</h2>
                            <p class="mt-4 text-lg text-gray-600">Have an idea? Let's build it together.</p>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-8">
                            <!-- Contact form -->
                            <ContactForm />

                            <!-- Contact info cards -->
                            <div class="space-y-6">
                                <!-- Email card -->
                                <div
                                    class="rounded-xl bg-white border border-gray-200 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="p-6 flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 rounded-xl bg-[rgb(var(--blue-rgb)/0.1)] flex items-center justify-center border border-[rgb(var(--blue-rgb)/0.3)]">
                                            <!-- Increased border radius to rounded-xl, kept blue as secondary -->
                                            <svg class="w-6 h-6 text-[#6AB0EF]" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900"
                                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Email</h3>
                                            <a href="mailto:hharutyunyan97@gmail.com"
                                               class="mt-1 inline-block text-sm text-gray-700 hover:text-gray-900 underline underline-offset-2">
                                                hharutyunyan97@gmail.com
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phone card -->
                                <div
                                    class="rounded-xl bg-white border border-gray-200 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="p-6 flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center border border-green-500/30">
                                            <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.516l.26 1.04a2 2 0 01-.45 1.86l-1.2 1.2a16 16 0 006.36 6.36l1.2-1.2a2 2 0 011.86-.45l1.04.26A2 2 0 0121 17.72V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900"
                                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Phone</h3>
                                            <a href="tel:+37444941211"
                                               class="mt-1 inline-block text-sm text-gray-700 hover:text-gray-900">
                                                +374 44 941 211
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Location card -->
                                <div
                                    class="rounded-xl bg-white border border-gray-200 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="p-6 flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 rounded-xl bg-[#FFD93D]/10 flex items-center justify-center border border-[#FFD93D]/30">
                                            <!-- Increased border radius to rounded-xl, changed to yellow -->
                                            <svg class="w-6 h-6 text-[#FFD93D]" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900"
                                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Location</h3>
                                            <p class="mt-1 text-sm text-gray-600">Remote / Worldwide</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Response time card -->
                                <div
                                    class="rounded-xl bg-white border border-gray-200 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                    <div class="p-6 flex items-start gap-4">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 rounded-xl bg-[--color-primary]/10 flex items-center justify-center border border-[#F98F8F]/30">
                                            <!-- Increased border radius to rounded-xl, kept red as tertiary -->
                                            <svg class="w-6 h-6 text-[#F98F8F]" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-gray-900"
                                                style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Response
                                                time</h3>
                                            <p class="mt-1 text-sm text-gray-600">Within 24 hours</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social links card -->
                                <div class="rounded-xl bg-white border border-gray-200 shadow-md overflow-hidden">
                                    <!-- Changed social card gradient to yellow -->
                                    <div class="p-6">
                                        <h3 class="font-bold text-gray-900 mb-4"
                                            style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Connect with
                                            me</h3>
                                        <div class="flex gap-3">
                                            <a
                                                v-for="social in socials"
                                                :key="social.name"
                                                :href="social.href"
                                                target="_blank"
                                                rel="noreferrer"
                                                class="flex items-center justify-center w-12 h-12 rounded-xl bg-white border border-gray-200 hover:border-[#6AB0EF] hover:-translate-y-1 transition-all duration-300 shadow-md"
                                                :title="social.name"
                                            >
                                                <!-- Increased border radius to rounded-xl -->
                                                <svg class="w-5 h-5 text-gray-900" fill="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <!-- Changed icon color to dark for contrast -->
                                                    <path :d="social.icon"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Light status bar with solid yellow -->
        <div
            class="fixed bottom-0 left-0 right-0 lg:left-56 z-40 bg-[var(--color-secondary)] text-gray-900 px-6 py-3 shadow-lg">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <!-- CHANGED: Simplified status bar with minimal terminal style -->
                    <div class="w-2 h-2 rounded-full bg-gray-900 animate-pulse"></div>
                    <span class="text-sm font-mono" style="font-family: 'SF Mono', Monaco, Menlo, monospace;">~/{{
                            currentSectionInfo.label.toLowerCase()
                        }}</span>
                </div>
                <span class="text-sm font-mono font-bold" style="font-family: 'SF Mono', Monaco, Menlo, monospace;">[{{
                        String(currentSectionInfo.index).padStart(2, '0')
                    }}/{{ String(currentSectionInfo.total).padStart(2, '0') }}]</span>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
html {
    scroll-behavior: smooth;
}

/* macOS terminal font applied globally */
* {
    font-family: 'SF Mono', Monaco, Menlo, 'Courier New', monospace;
}

/* Added code tag styling */
code {
    font-family: 'SF Mono', Monaco, Menlo, 'Courier New', monospace;
    font-size: 0.9em;
}
</style>
