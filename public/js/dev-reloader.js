/**
 * 7Series Local Development Auto-Reloader
 * Monitors codebase file modifications and automatically reloads browser tabs
 * across both Filament admin panels and public frontend pages.
 */
(function() {
    if (window.__devReloaderInitialized) return;
    window.__devReloaderInitialized = true;

    let currentTs = null;
    let isChecking = false;

    async function checkReload() {
        if (isChecking) return;
        isChecking = true;
        try {
            const res = await fetch('/_dev/reload-check?_=' + Date.now(), {
                credentials: 'same-origin',
                cache: 'no-store'
            });
            if (res.ok) {
                const data = await res.json();
                if (currentTs === null) {
                    currentTs = data.timestamp;
                } else if (data.timestamp > currentTs) {
                    console.log('[DevReloader] Code modification detected (mtime: ' + data.timestamp + '). Reloading...');
                    currentTs = data.timestamp;
                    window.location.reload();
                    return;
                }
            }
        } catch (_) {
            // Silently ignore transient network drops
        } finally {
            isChecking = false;
            setTimeout(checkReload, 800);
        }
    }

    setTimeout(checkReload, 1000);
})();
