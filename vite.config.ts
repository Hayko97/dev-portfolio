import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

// Ensure global crypto for libs (nanoid, etc) during build in Node
import { webcrypto as nodeCrypto } from 'node:crypto'
if (!globalThis.crypto || typeof globalThis.crypto.getRandomValues !== 'function') {
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    (globalThis as any).crypto = nodeCrypto as unknown as Crypto
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            refresh: true,
        }),
        vue(),
    ],
})
