import * as THREE from 'three';

/**
 * Seven Series - Exact Brand Emblem 3D Engine
 * Precision-modeled from the official Seven Series brand symbol with MeshPhysicalMaterial.
 */
export function initHero3D() {
    const container = document.getElementById('hero-3d-container');
    if (!container) return;

    const canvas = document.getElementById('hero-3d-canvas');
    if (!canvas) return;

    let width = container.clientWidth;
    let height = container.clientHeight;

    // Scene, Camera, Renderer (Clean Bright High-Contrast Studio)
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(42, width / height, 0.1, 100);
    camera.position.set(0, 0, 6.8);

    const renderer = new THREE.WebGLRenderer({
        canvas: canvas,
        alpha: true,
        antialias: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.25;

    // Root Monolith & Hardware Groups
    const emblemGroup = new THREE.Group();
    scene.add(emblemGroup);

    const hardwareGroup = new THREE.Group();
    scene.add(hardwareGroup);

    // -------------------------------------------------------------
    // Exact Seven Series Emblem Contour Points (Vector-Traced)
    // -------------------------------------------------------------
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

    const extrudeSettings = {
        steps: 2,
        depth: 0.42,
        bevelEnabled: true,
        bevelThickness: 0.08,
        bevelSize: 0.05,
        bevelOffset: 0,
        bevelSegments: 4
    };

    const geometry = new THREE.ExtrudeGeometry(shape, extrudeSettings);
    geometry.center();

    // Vibrant Seven Series Signature Crimson Physical Material
    const emblemMaterial = new THREE.MeshPhysicalMaterial({
        color: 0xE51E2B,
        metalness: 0.35,
        roughness: 0.16,
        clearcoat: 0.95,
        clearcoatRoughness: 0.08,
        reflectivity: 0.9,
        emissive: 0x991b1b,
        emissiveIntensity: 0.12,
    });

    const mesh = new THREE.Mesh(geometry, emblemMaterial);
    emblemGroup.add(mesh);

    // Subtle Precision Edge Wireframe
    const edgesGeometry = new THREE.EdgesGeometry(geometry);
    const wireframeMaterial = new THREE.LineBasicMaterial({
        color: 0xffffff,
        linewidth: 1,
        transparent: true,
        opacity: 0.35
    });
    const wireframeLine = new THREE.LineSegments(edgesGeometry, wireframeMaterial);
    emblemGroup.add(wireframeLine);

    // -------------------------------------------------------------
    // Floating Solid Brass & Copper 3D Rivets (Tumbling)
    // -------------------------------------------------------------
    const rivetGeom = new THREE.CylinderGeometry(0.18, 0.22, 0.08, 16);
    const rivetMat = new THREE.MeshStandardMaterial({
        color: 0xd97706, // Polished amber brass
        metalness: 0.95,
        roughness: 0.2,
    });

    const rivetPositions = [
        [-2.3, 1.7, 1.1],
        [2.2, -1.6, 0.8],
        [-2.1, -1.8, -0.6],
        [2.3, 1.9, -1.0],
    ];

    const rivetMeshes = rivetPositions.map((pos) => {
        const r = new THREE.Mesh(rivetGeom, rivetMat);
        r.position.set(...pos);
        r.rotation.x = Math.random() * Math.PI;
        r.rotation.z = Math.random() * Math.PI;
        hardwareGroup.add(r);
        return r;
    });

    // -------------------------------------------------------------
    // Orbiting Selvedge Tracer Ring
    // -------------------------------------------------------------
    const ringRadius = 2.4;
    const ringCurve = new THREE.EllipseCurve(0, 0, ringRadius, ringRadius * 0.92, 0, 2 * Math.PI, false, 0);
    const ringPoints = ringCurve.getPoints(100);
    const ringGeom = new THREE.BufferGeometry().setFromPoints(ringPoints.map(p => new THREE.Vector3(p.x, p.y, 0)));

    const ringMat = new THREE.LineDashedMaterial({
        color: 0xE51E2B,
        dashSize: 0.15,
        gapSize: 0.08,
        transparent: true,
        opacity: 0.75
    });
    const selvedgeRing = new THREE.Line(ringGeom, ringMat);
    selvedgeRing.computeLineDistances();
    selvedgeRing.rotation.x = Math.PI / 2.7;
    scene.add(selvedgeRing);

    // -------------------------------------------------------------
    // Clean Studio Lighting Rig (Vibrant & Warm)
    // -------------------------------------------------------------
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.6);
    scene.add(ambientLight);

    const mainKeyLight = new THREE.DirectionalLight(0xffffff, 2.8);
    mainKeyLight.position.set(5, 6, 7);
    scene.add(mainKeyLight);

    const softFillLight = new THREE.DirectionalLight(0xfff1f2, 1.4);
    softFillLight.position.set(-6, -4, 4);
    scene.add(softFillLight);

    const pointerLight = new THREE.PointLight(0xff3344, 2.5, 9);
    pointerLight.position.set(0, 0, 3.5);
    scene.add(pointerLight);

    // -------------------------------------------------------------
    // Interactive Controls & State
    // -------------------------------------------------------------
    let mouseX = 0;
    let mouseY = 0;
    let targetRotationX = 0;
    let targetRotationY = 0;
    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    let isAutoRotating = true;
    let isWireframeOnly = false;
    let isVisible = true;
    let scrollYOffset = 0;

    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        const y = -(((e.clientY - rect.top) / rect.height) * 2 - 1);

        mouseX = x;
        mouseY = y;

        pointerLight.position.x = x * 3.5;
        pointerLight.position.y = y * 3.5;

        if (!isDragging) {
            targetRotationY = x * 0.75;
            targetRotationX = -y * 0.55;
        }
    });

    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        isAutoRotating = false;
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    window.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            setTimeout(() => { if (!isDragging) isAutoRotating = true; }, 2200);
        }
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const deltaX = e.clientX - previousMousePosition.x;
        const deltaY = e.clientY - previousMousePosition.y;

        emblemGroup.rotation.y += deltaX * 0.01;
        emblemGroup.rotation.x += deltaY * 0.01;

        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    // Touch support for mobile users
    container.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
            isDragging = true;
            isAutoRotating = false;
            previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }
    }, { passive: true });

    window.addEventListener('touchend', () => {
        if (isDragging) {
            isDragging = false;
            setTimeout(() => { if (!isDragging) isAutoRotating = true; }, 2200);
        }
    }, { passive: true });

    window.addEventListener('touchmove', (e) => {
        if (!isDragging || e.touches.length !== 1) return;
        const deltaX = e.touches[0].clientX - previousMousePosition.x;
        const deltaY = e.touches[0].clientY - previousMousePosition.y;

        emblemGroup.rotation.y += deltaX * 0.01;
        emblemGroup.rotation.x += deltaY * 0.01;

        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, { passive: true });

    // Scroll listener for 3D tumbling kinematics
    window.addEventListener('scroll', () => {
        scrollYOffset = window.scrollY;
    }, { passive: true });

    // Viewport control buttons
    const wireframeBtn = document.getElementById('btn-3d-wireframe');
    if (wireframeBtn) {
        wireframeBtn.addEventListener('click', () => {
            isWireframeOnly = !isWireframeOnly;
            mesh.visible = !isWireframeOnly;
            wireframeMaterial.opacity = isWireframeOnly ? 0.9 : 0.35;
            wireframeBtn.classList.toggle('bg-red-600', isWireframeOnly);
            wireframeBtn.classList.toggle('text-white', isWireframeOnly);
        });
    }

    const resetBtn = document.getElementById('btn-3d-reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            targetRotationX = 0;
            targetRotationY = 0;
            emblemGroup.rotation.set(0, 0, 0);
            isAutoRotating = true;
        });
    }

    // Pause rendering when outside viewport to preserve battery/60fps
    const io = new IntersectionObserver(([entry]) => {
        isVisible = entry.isIntersecting;
    }, { threshold: 0.05 });
    io.observe(container);

    function handleResize() {
        if (!container) return;
        width = container.clientWidth;
        height = container.clientHeight;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    }
    window.addEventListener('resize', handleResize);

    // -------------------------------------------------------------
    // Animation Render Loop (Solid 60 FPS)
    // -------------------------------------------------------------
    let clock = new THREE.Clock();

    function renderLoop() {
        if (!canvas || !canvas.isConnected) return;
        requestAnimationFrame(renderLoop);
        if (!isVisible) return;

        const delta = clock.getDelta();
        const elapsedTime = clock.getElapsedTime();

        const scrollFactor = scrollYOffset * 0.0012;
        hardwareGroup.rotation.y = scrollFactor * 1.4;
        hardwareGroup.rotation.x = scrollFactor * 0.7;

        rivetMeshes.forEach((r, idx) => {
            r.rotation.x += delta * (0.9 + idx * 0.2);
            r.rotation.y += delta * (0.7 + idx * 0.15);
            r.position.y += Math.sin(elapsedTime * 2 + idx) * 0.002;
        });

        if (isAutoRotating) {
            emblemGroup.rotation.y += delta * 0.45;
            emblemGroup.rotation.x = Math.sin(elapsedTime * 0.8) * 0.12;
            emblemGroup.position.y = Math.sin(elapsedTime * 1.5) * 0.08 - (scrollFactor * 0.4);
        } else if (!isDragging) {
            emblemGroup.rotation.y += (targetRotationY - emblemGroup.rotation.y) * 0.05;
            emblemGroup.rotation.x += (targetRotationX - emblemGroup.rotation.x) * 0.05;
            emblemGroup.position.y = - (scrollFactor * 0.4);
        }

        selvedgeRing.rotation.z += delta * 0.35;

        renderer.render(scene, camera);
    }

    renderLoop();
}
