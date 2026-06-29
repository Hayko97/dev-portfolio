/// <reference types="vite/client" />

declare module 'node:crypto' {
    export const webcrypto: Crypto;
}
