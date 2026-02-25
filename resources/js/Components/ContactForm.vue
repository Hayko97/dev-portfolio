<script setup lang="ts">
import { ref } from 'vue'

// Contact form state
const contactForm = ref({
  name: '',
  email: '',
  message: '',
})

// UX + validation state for contact form
const isSending = ref(false)
const successMessage = ref<string | null>(null)
const errorMessage = ref<string | null>(null)
const fieldErrors = ref<{ name?: string; email?: string; message?: string }>({})
const botcheck = ref(false)

function validate() {
  const errors: { name?: string; email?: string; message?: string } = {}
  const name = contactForm.value.name?.trim() || ''
  const email = contactForm.value.email?.trim() || ''
  const message = contactForm.value.message?.trim() || ''

  if (!name) {
    errors.name = 'Name is required.'
  } else if (name.length < 2 || name.length > 80) {
    errors.name = 'Name must be between 2 and 80 characters.'
  }

  if (!email) {
    errors.email = 'Email is required.'
  } else {
    const basicEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!basicEmail.test(email)) {
      errors.email = 'Enter a valid email address.'
    }
  }

  if (!message) {
    errors.message = 'Message is required.'
  } else if (message.length < 10 || message.length > 4000) {
    errors.message = 'Message must be between 10 and 4000 characters.'
  }

  fieldErrors.value = errors
  return Object.keys(errors).length === 0
}

const submitContact = async () => {
  // reset alerts
  successMessage.value = null
  errorMessage.value = null
  fieldErrors.value = {}

  if (!validate()) return

  const accessKey = (import.meta as any).env?.VITE_WEB3FORMS_ACCESS_KEY as string | undefined
  if (!accessKey) {
    errorMessage.value = 'Contact form is not configured.'
    return
  }

  isSending.value = true
  try {
    const name = contactForm.value.name.trim()
    const email = contactForm.value.email.trim()
    const message = contactForm.value.message.trim()

    const res = await fetch('https://api.web3forms.com/submit', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: JSON.stringify({
        access_key: accessKey,
        name,
        email,
        message,
        subject: `[Portfolio] ${name} sent a message`,
        botcheck: botcheck.value,
      }),
    })

    let result: any = {}
    try {
      result = await res.json()
    } catch (e) {
      // keep result as empty object if parsing fails
    }

    if (!res.ok || (typeof result === 'object' && result && result.success === false)) {
      errorMessage.value = (result && result.message) ? String(result.message) : 'Failed to send. Please try again.'
      return
    }

    successMessage.value = "Thanks! I’ll reply within 24 hours."
    // Clear only the message; keep name/email for convenience
    contactForm.value.message = ''
  } catch (err: any) {
    errorMessage.value = err?.message ? String(err.message) : 'Failed to send. Please try again.'
  } finally {
    isSending.value = false
  }
}
</script>

<template>
  <div class="rounded-xl bg-white border border-gray-200 shadow-lg overflow-hidden">
    <form @submit.prevent="submitContact" class="p-8 space-y-6">
      <!-- Web3Forms spam trap -->
      <input type="checkbox" v-model="botcheck" name="botcheck" class="hidden" style="display:none;" tabindex="-1" autocomplete="off" />

      <!-- Alerts -->
      <div v-if="successMessage" class="rounded-lg border border-green-200 bg-green-50 p-4 text-green-800 text-sm">
        {{ successMessage }}
      </div>
      <div v-if="errorMessage" class="rounded-lg border border-red-200 bg-red-50 p-4 text-red-800 text-sm">
        {{ errorMessage }}
      </div>

      <div>
        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2"
               style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Name</label>
        <input
          id="name"
          v-model="contactForm.name"
          type="text"
          required
          style="color: #000"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[var(--color-secondary)] focus:ring-2 focus:ring-[rgb(var(--yellow-rgb)/0.2)] outline-none transition-all"
          placeholder="Your name"
        />
        <p v-if="fieldErrors.name" class="mt-2 text-sm text-red-600">{{ fieldErrors.name }}</p>
        <!-- Changed focus border to yellow, increased border radius to rounded-xl -->
      </div>

      <div>
        <label for="email" class="block text-sm font-semibold text-gray-900 mb-2"
               style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Email</label>
        <input
          id="email"
          v-model="contactForm.email"
          type="email"
          style="color: #000"
          required
          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[var(--color-secondary)] focus:ring-2 focus:ring-[rgb(var(--yellow-rgb)/0.2)] outline-none transition-all"
          placeholder="your@email.com"
        />
        <p v-if="fieldErrors.email" class="mt-2 text-sm text-red-600">{{ fieldErrors.email }}</p>
      </div>

      <div>
        <label for="message" class="block text-sm font-semibold text-gray-900 mb-2"
               style="font-family: 'SF Mono', Monaco, Menlo, monospace;">Message</label>
        <textarea
          id="message"
          v-model="contactForm.message"
          required
          rows="5"
          style="color: #000"
          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-[var(--color-secondary)] focus:ring-2 focus:ring-[rgb(var(--yellow-rgb)/0.2)] outline-none transition-all resize-none"
          placeholder="Tell me about your project..."
        ></textarea>
        <p v-if="fieldErrors.message" class="mt-2 text-sm text-red-600">{{ fieldErrors.message }}</p>
      </div>

      <button
        type="submit"
        :disabled="isSending"
        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[var(--color-secondary)] px-6 py-4 text-base font-semibold text-gray-900 shadow-lg shadow-[rgb(var(--yellow-rgb)/0.3)] hover:bg-[var(--color-secondary-300)] transition-all duration-300 hover:scale-105 disabled:opacity-60 disabled:cursor-not-allowed"
        style="font-family: 'SF Mono', Monaco, Menlo, monospace;"
      >
        <!-- Changed submit button to yellow gradient -->
        <span v-if="isSending">Sending…</span>
        <span v-else>Send message</span>
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M14 5l7 7m0 0l-7 7m7-7H3"/>
        </svg>
      </button>
    </form>
  </div>
</template>
