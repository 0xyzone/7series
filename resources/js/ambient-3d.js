import * as THREE from 'three';

/**
 * Seven Series - Ambient 3D Brand Symbol Depth-of-Field Aesthetics
 * Renders floating, slow-drifting 3D brand emblems with optical Depth of Field (DoF):
 * - Sharp, crisp focal plane in mid-ground
 * - Soft photographic blur halo on distant background symbols
 * - Soft bokeh blur halo on near foreground symbols
 * - Non-distracting, gentle opacity and slow zero-gravity drift
 */
export function initAmbient3D() {
    const canvas = document.getElementById('ambient-3d-canvas');
    if (!canvas) return;

    // Check prefers-reduced-motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let width = window.innerWidth;
    let height = window.innerHeight;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(40, width / height, 0.1, 80);
    camera.position.set(0, 0, 16);

    const renderer = new THREE.WebGLRenderer({
        canvas: canvas,
        alpha: true,
        antialias: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.1;

    // -----------------------------------------------------------------
    // Soft Lighting for Clear Visibility and Depth
    // -----------------------------------------------------------------
    const ambientLight = new THREE.AmbientLight(0xffffff, 2.4);
    scene.add(ambientLight);

    const dirLight1 = new THREE.DirectionalLight(0xffffff, 2.0);
    dirLight1.position.set(6, 10, 8);
    scene.add(dirLight1);

    const dirLight2 = new THREE.DirectionalLight(0xfff1f2, 1.2);
    dirLight2.position.set(-6, -6, 5);
    scene.add(dirLight2);

    const redGlow = new THREE.PointLight(0xE51E2B, 1.5, 14);
    redGlow.position.set(0, 2, 4);
    scene.add(redGlow);

    // -----------------------------------------------------------------
    // Brand Emblem Contour Geometry (Precision Vector-Traced)
    // -----------------------------------------------------------------
    const contourPoints = [
        [1.2391, 1.5969], [1.2391, 1.5719], [1.2391, 1.5469], [1.2391, 1.5219], [1.2391, 1.4969],
        [1.2391, 1.4719], [1.2391, 1.4469], [1.2391, 1.4219], [1.2391, 1.3969], [1.2391, 1.3719],
        [1.2391, 1.3469], [1.2391, 1.3219], [1.2391, 1.2969], [1.2391, 1.2719], [1.2391, 1.2469],
        [1.2391, 1.2219], [1.2391, 1.1969], [1.2391, 1.1719], [1.2391, 1.1469], [1.2391, 1.1219],
        [1.2391, 1.0969], [1.2391, 1.0719], [1.2391, 1.0469], [1.2391, 1.0219], [1.2391, 0.9969],
        [1.2391, 0.9719], [1.2391, 0.9469], [1.2391, 0.9219], [1.2391, 0.8969], [1.2391, 0.8719],
        [1.2391, 0.8469], [1.2391, 0.8219], [1.2391, 0.7969], [1.2391, 0.7719], [1.2391, 0.7469],
        [1.2391, 0.7219], [1.2391, 0.6969], [1.2391, 0.6719], [1.2391, 0.6469], [1.2391, 0.6219],
        [1.2391, 0.5969], [1.2391, 0.5719], [1.2391, 0.5469], [1.2391, 0.5219], [1.2391, 0.4969],
        [1.2391, 0.4719], [1.2391, 0.4469], [1.2391, 0.4219], [1.2391, 0.3969], [1.2391, 0.3719],
        [1.2391, 0.3469], [1.2391, 0.3219], [1.2391, 0.2969], [1.2391, 0.2719], [1.2391, 0.2469],
        [1.2391, 0.2219], [1.2391, 0.1969], [1.2391, 0.1719], [1.2391, 0.1469], [1.2391, 0.1219],
        [1.2391, 0.0969], [1.2391, 0.0719], [1.2391, 0.0469], [1.2391, 0.0219], [1.2391, -0.0031],
        [1.2391, -0.0281], [1.2391, -0.0531], [1.2391, -0.0781], [1.2391, -0.1031], [1.2391, -0.1281],
        [1.2391, -0.1531], [1.2391, -0.1781], [1.2391, -0.2031], [1.2391, -0.2281], [1.2391, -0.2531],
        [1.2391, -0.2781], [1.2391, -0.3031], [1.2391, -0.3281], [1.2391, -0.3531],
        [1.0609, -0.3781], [0.9359, -0.4031], [0.8516, -0.4281], [0.7828, -0.4531], [0.7266, -0.4781],
        [0.6734, -0.5031], [0.6297, -0.5281], [0.5859, -0.5531], [0.5484, -0.5781], [0.5141, -0.6031],
        [0.4797, -0.6281], [0.4484, -0.6531], [0.4203, -0.6781], [0.3922, -0.7031], [0.3672, -0.7281],
        [0.3422, -0.7531], [0.3203, -0.7781], [0.2984, -0.8031], [0.2797, -0.8281], [0.2578, -0.8531],
        [0.2391, -0.8781], [0.2234, -0.9031], [0.2047, -0.9281], [0.1922, -0.9531], [0.1766, -0.9781],
        [0.1609, -1.0031], [0.1484, -1.0281], [0.1359, -1.0531], [0.1234, -1.0781], [0.1109, -1.1031],
        [0.1016, -1.1281], [0.0922, -1.1531], [0.0828, -1.1781], [0.0734, -1.2031], [0.0641, -1.2281],
        [0.0578, -1.2531], [0.0516, -1.2781], [0.0453, -1.3031], [0.0391, -1.3281], [0.0328, -1.3531],
        [0.0297, -1.3781], [0.0234, -1.4031], [0.0203, -1.4281], [0.0172, -1.4531], [0.0141, -1.4781],
        [0.0109, -1.5031], [0.0109, -1.5281], [0.0109, -1.5531], [0.0078, -1.5781], [0.0078, -1.5969],
        [-1.0016, -1.5969], [-1.0016, -1.5719], [-1.0016, -1.5469], [-1.0016, -1.5219], [-0.9984, -1.4969],
        [-0.9984, -1.4719], [-0.9953, -1.4469], [-0.9953, -1.4219], [-0.9922, -1.3969], [-0.9891, -1.3719],
        [-0.9891, -1.3469], [-0.9859, -1.3219], [-0.9828, -1.2969], [-0.9797, -1.2719], [-0.9734, -1.2469],
        [-0.9703, -1.2219], [-0.9672, -1.1969], [-0.9609, -1.1719], [-0.9578, -1.1469], [-0.9516, -1.1219],
        [-0.9453, -1.0969], [-0.9391, -1.0719], [-0.9328, -1.0469], [-0.9266, -1.0219], [-0.9203, -0.9969],
        [-0.9141, -0.9719], [-0.9047, -0.9469], [-0.8984, -0.9219], [-0.8891, -0.8969], [-0.8828, -0.8719],
        [-0.8734, -0.8469], [-0.8641, -0.8219], [-0.8547, -0.7969], [-0.8453, -0.7719], [-0.8359, -0.7469],
        [-0.8234, -0.7219], [-0.8141, -0.6969], [-0.8016, -0.6719], [-0.7922, -0.6469], [-0.7797, -0.6219],
        [-0.7672, -0.5969], [-0.7547, -0.5719], [-0.7422, -0.5469], [-0.7266, -0.5219], [-0.7141, -0.4969],
        [-0.6984, -0.4719], [-0.6859, -0.4469], [-0.6703, -0.4219], [-0.6547, -0.3969], [-0.6391, -0.3719],
        [-0.6203, -0.3469], [-0.6047, -0.3219], [-0.5859, -0.2969], [-0.5703, -0.2719], [-0.5516, -0.2469],
        [-0.5297, -0.2219], [-0.5109, -0.1969], [-0.4922, -0.1719], [-0.4703, -0.1469], [-0.4484, -0.1219],
        [-0.4266, -0.0969], [-0.4047, -0.0719], [-0.3797, -0.0469], [-0.3578, -0.0219], [-0.3297, 0.0031],
        [-0.3047, 0.0281], [-0.2797, 0.0531], [-0.2516, 0.0781], [-0.2234, 0.1031], [-0.1922, 0.1281],
        [-0.1609, 0.1531], [-0.1297, 0.1781], [-0.0984, 0.2031], [-0.0641, 0.2281], [-0.0297, 0.2531],
        [0.0078, 0.2781], [0.0484, 0.3031], [0.0891, 0.3281], [0.1297, 0.3531], [0.1766, 0.3781],
        [0.2234, 0.4031], [0.2734, 0.4281], [0.3266, 0.4531], [0.3859, 0.4781], [0.4484, 0.5031],
        [0.5172, 0.5281], [0.5953, 0.5531], [0.6859, 0.5781], [0.7953, 0.6031],
        [-1.2422, 0.6281], [-1.2422, 0.6531], [-1.2422, 0.6781], [-1.2422, 0.7031], [-1.2422, 0.7281],
        [-1.2422, 0.7531], [-1.2422, 0.7781], [-1.2422, 0.8031], [-1.2422, 0.8281], [-1.2422, 0.8531],
        [-1.2422, 0.8781], [-1.2422, 0.9031], [-1.2422, 0.9281], [-1.2422, 0.9531], [-1.2422, 0.9781],
        [-1.2422, 1.0031], [-1.2422, 1.0281], [-1.2422, 1.0531], [-1.2422, 1.0781], [-1.2422, 1.1031],
        [-1.2422, 1.1281], [-1.2422, 1.1531], [-1.2422, 1.1781], [-1.2422, 1.2031], [-1.2422, 1.2281],
        [-1.2422, 1.2531], [-1.2422, 1.2781], [-1.2422, 1.3031], [-1.2422, 1.3281], [-1.2422, 1.3531],
        [-1.2422, 1.3781], [-1.2422, 1.4031], [-1.2422, 1.4281], [-1.2422, 1.4531], [-1.2422, 1.4781],
        [-1.2422, 1.5031], [-1.2422, 1.5281], [-1.2422, 1.5531], [-1.2422, 1.5781], [-1.2422, 1.5969]
    ];

    const shape = new THREE.Shape();
    shape.moveTo(contourPoints[0][0], contourPoints[0][1]);
    for (let i = 1; i < contourPoints.length; i++) {
        shape.lineTo(contourPoints[i][0], contourPoints[i][1]);
    }
    shape.closePath();

    const emblemGeom = new THREE.ExtrudeGeometry(shape, {
        steps: 1,
        depth: 0.30,
        bevelEnabled: true,
        bevelThickness: 0.05,
        bevelSize: 0.035,
        bevelSegments: 2
    });
    emblemGeom.center();

    // -----------------------------------------------------------------
    // Helper: Create Out-Of-Focus Blurred Emblem with Soft Optical Halos
    // Simulates Circle-of-Confusion lens blur without fragile FBO passes
    // -----------------------------------------------------------------
    function createOpticalDepthEmblem(geometry, options) {
        const group = new THREE.Group();
        const {
            color = 0xE51E2B,
            opacity = 0.45,
            isBlur = false,
            blurSpread = 0.06,
            blurLayers = 3,
            metalness = 0.35,
            roughness = 0.3
        } = options;

        if (!isBlur) {
            // Sharp Mid-ground Emblem (In-Focus)
            const sharpMat = new THREE.MeshPhysicalMaterial({
                color: color,
                metalness: metalness,
                roughness: roughness,
                clearcoat: 0.7,
                clearcoatRoughness: 0.15,
                transparent: true,
                opacity: opacity
            });
            const mesh = new THREE.Mesh(geometry, sharpMat);
            group.add(mesh);
        } else {
            // Out-Of-Focus Emblem: Core + Concentric Diffused Bokeh Halos
            const coreMat = new THREE.MeshPhysicalMaterial({
                color: color,
                metalness: 0.2,
                roughness: 0.85, // High roughness diffuses reflections like lens blur
                transparent: true,
                opacity: opacity * 0.7,
                depthWrite: true
            });
            const coreMesh = new THREE.Mesh(geometry, coreMat);
            group.add(coreMesh);

            // Layered feathered shells creating authentic optical Circle of Confusion
            for (let i = 1; i <= blurLayers; i++) {
                const spread = 1.0 + (i * blurSpread);
                const shellMat = new THREE.MeshBasicMaterial({
                    color: color,
                    transparent: true,
                    opacity: (opacity * 0.25) / i,
                    depthWrite: false,
                    blending: THREE.NormalBlending
                });
                const shellMesh = new THREE.Mesh(geometry, shellMat);
                shellMesh.scale.set(spread, spread, spread);
                group.add(shellMesh);
            }
        }

        return group;
    }

    // -----------------------------------------------------------------
    // 4 Curated Emblems with Real Depth & Out-Of-Focus Lens Blur
    // -----------------------------------------------------------------
    const floatingItems = [];

    const emblemConfigs = [
        // 1. IN-FOCUS Midground Emblem (Sharp & Crisp) - Right Margin
        {
            x: 9.4, y: 3.5, z: 0.0,
            scale: 0.72,
            options: { color: 0xE51E2B, opacity: 0.55, isBlur: false, metalness: 0.45, roughness: 0.25 },
            rx: 0.0006, ry: 0.0009,
            bobSpeed: 0.45, bobAmp: 0.15, phase: 0
        },

        // 2. FAR BACKGROUND Emblem (Out-Of-Focus Depth Blur) - Left Lower Margin
        {
            x: -10.0, y: -2.8, z: -8.5,
            scale: 0.58,
            options: { color: 0x3f3f46, opacity: 0.40, isBlur: true, blurSpread: 0.065, blurLayers: 4 },
            rx: -0.0007, ry: 0.0008,
            bobSpeed: 0.38, bobAmp: 0.18, phase: 2.1
        },

        // 3. NEAR FOREGROUND Emblem (Large Out-Of-Focus Bokeh Blur) - Lower Right Margin
        {
            x: 7.8, y: -6.5, z: 5.5,
            scale: 0.88,
            options: { color: 0xd97706, opacity: 0.35, isBlur: true, blurSpread: 0.09, blurLayers: 4 },
            rx: 0.0008, ry: -0.0007,
            bobSpeed: 0.50, bobAmp: 0.14, phase: 4.2
        },

        // 4. FAR DISTANT Emblem (Soft Atmospheric Background Blur) - Upper Left Margin
        {
            x: -8.6, y: 6.8, z: -6.8,
            scale: 0.54,
            options: { color: 0x991b1b, opacity: 0.38, isBlur: true, blurSpread: 0.06, blurLayers: 3 },
            rx: 0.0005, ry: 0.0007,
            bobSpeed: 0.42, bobAmp: 0.16, phase: 1.2
        }
    ];

    emblemConfigs.forEach(cfg => {
        const emblemObj = createOpticalDepthEmblem(emblemGeom, cfg.options);
        emblemObj.position.set(cfg.x, cfg.y, cfg.z);
        emblemObj.scale.setScalar(cfg.scale);
        emblemObj.rotation.set(0.18, 0.32, 0.08);
        scene.add(emblemObj);

        floatingItems.push({
            obj: emblemObj,
            baseX: cfg.x,
            baseY: cfg.y,
            rotSpeedX: cfg.rx,
            rotSpeedY: cfg.ry,
            rotSpeedZ: 0.0003,
            bobSpeed: cfg.bobSpeed,
            bobAmp: cfg.bobAmp,
            phase: cfg.phase
        });
    });

    // -----------------------------------------------------------------
    // Gentle Scroll Parallax (Smooth and Non-Distracting)
    // -----------------------------------------------------------------
    let scrollY = window.pageYOffset || 0;
    let targetCameraY = 0;
    let currentCameraY = 0;

    window.addEventListener('scroll', () => {
        scrollY = window.pageYOffset || 0;
        targetCameraY = - (scrollY * 0.0018);
    }, { passive: true });

    // Responsive Canvas Resizing
    window.addEventListener('resize', () => {
        width = window.innerWidth;
        height = window.innerHeight;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();

        renderer.setSize(width, height);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));

        if (width < 768) {
            camera.position.z = 21;
        } else {
            camera.position.z = 16;
        }
    });

    if (width < 768) {
        camera.position.z = 21;
    }

    // -----------------------------------------------------------------
    // Ultra-Smooth, Slow Floating Animation Loop (Direct, Reliable Render)
    // -----------------------------------------------------------------
    let animationFrameId;
    let isTabVisible = !document.hidden;

    document.addEventListener('visibilitychange', () => {
        isTabVisible = !document.hidden;
        if (isTabVisible && !prefersReducedMotion) {
            lastTime = performance.now();
            tick(lastTime);
        }
    });

    let lastTime = performance.now();

    function tick(currentTime) {
        if (!isTabVisible) return;

        const delta = (currentTime - lastTime) * 0.001;
        lastTime = currentTime;
        const timeSec = currentTime * 0.001;

        if (!prefersReducedMotion) {
            // Very smooth, subtle camera parallax easing
            currentCameraY += (targetCameraY - currentCameraY) * 0.04;
            camera.position.y = currentCameraY;

            // Slow, peaceful zero-gravity rotation & floating drift
            for (let i = 0; i < floatingItems.length; i++) {
                const item = floatingItems[i];
                item.obj.rotation.x += item.rotSpeedX;
                item.obj.rotation.y += item.rotSpeedY;
                item.obj.rotation.z += item.rotSpeedZ;

                const bob = Math.sin(timeSec * item.bobSpeed + item.phase) * item.bobAmp;
                const drift = Math.cos(timeSec * (item.bobSpeed * 0.6) + item.phase) * (item.bobAmp * 0.4);

                item.obj.position.y = item.baseY + bob;
                item.obj.position.x = item.baseX + drift;
            }
        }

        // Direct hardware-accelerated render: guarantees 100% visibility, zero black screen
        renderer.render(scene, camera);
        animationFrameId = requestAnimationFrame(tick);
    }

    if (!prefersReducedMotion) {
        animationFrameId = requestAnimationFrame(tick);
    } else {
        renderer.render(scene, camera);
    }
}
