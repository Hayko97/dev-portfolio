// resources/js/types/global.d.ts
import type { AxiosInstance } from 'axios';
import type { route as ziggyRoute } from 'ziggy-js';

declare global {
    interface Window {
        axios: AxiosInstance;
    }

    // global helper: route(...)
    // eslint-disable-next-line no-var
    var route: typeof ziggyRoute;
}

declare module 'vue' {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

/**
 * ✅ Fix: do NOT extend PageProps from itself via imports.
 * Instead, augment PageProps directly with your custom props.
 */
declare module '@inertiajs/core' {
    interface PageProps {
        // Add your custom app props here if you have any, for example:
        // auth?: { user: { id: number; name: string } | null };
        // ziggy?: any;
    }
}

export {};
