import * as THREE from 'three';

/**
 * Seven Series - 3D Architectural Monolith & Floating Hardware Engine
 * Built with Three.js r186 principles, physical shaders, and scroll-linked kinematics.
 */
export function initHero3D() {
    const container = document.getElementById('hero-3d-container');
    if (!container) return;

    const canvas = document.getElementById('hero-3d-canvas');
    if (!canvas) return;

    // Dimensions
    let width = container.clientWidth;
    let height = container.clientHeight;

    // Scene, Camera, Renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 100);
    camera.position.set(0, 0, 7.5);

    const renderer = new THREE.WebGLRenderer({
        canvas: canvas,
        alpha: true,
        antialias: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.15;

    // Root Groups
    const monolithGroup = new THREE.Group();
    scene.add(monolithGroup);

    const hardwareGroup = new THREE.Group();
    scene.add(hardwareGroup);

    // -------------------------------------------------------------
    // Procedural Architectural "7" Geometry
    // -------------------------------------------------------------
    const shape = new THREE.Shape();
    shape.moveTo(-1.3, 1.4);
    shape.lineTo(1.4, 1.4);
    shape.lineTo(1.4, 0.85);
    shape.lineTo(0.15, -1.5);
    shape.lineTo(-0.55, -1.5);
    shape.lineTo(0.55, 0.75);
    shape.lineTo(-1.3, 0.75);
    shape.closePath();

    const extrudeSettings = {
        steps: 2,
        depth: 0.55,
        bevelEnabled: true,
        bevelThickness: 0.12,
        bevelSize: 0.08,
        bevelOffset: 0,
        bevelSegments: 4
    };

    const geometry = new THREE.ExtrudeGeometry(shape, extrudeSettings);
    geometry.center();

    // Theme detection
    const isDark = () => document.documentElement.classList.contains('dark');

    // Materials
    const solidMaterial = new THREE.MeshPhysicalMaterial({
        color: isDark() ? 0x141416 : 0xf4f4f5,
        metalness: isDark() ? 0.88 : 0.7,
        roughness: 0.22,
        clearcoat: 0.8,
        clearcoatRoughness: 0.15,
        reflectivity: 0.9,
        emissive: 0x991b1b,
        emissiveIntensity: isDark() ? 0.2 : 0.06,
    });

    const mesh = new THREE.Mesh(geometry, solidMaterial);
    monolithGroup.add(mesh);

    // Wireframe Edges Overlay (CAD Inspection)
    const edgesGeometry = new THREE.EdgesGeometry(geometry);
    const wireframeMaterial = new THREE.LineBasicMaterial({
        color: 0xdc2626,
        linewidth: 1.5,
        transparent: true,
        opacity: isDark() ? 0.65 : 0.45
    });
    const wireframeLine = new THREE.LineSegments(edgesGeometry, wireframeMaterial);
    monolithGroup.add(wireframeLine);

    // -------------------------------------------------------------
    // Floating Solid Brass & Copper 3D Rivet Studs
    // -------------------------------------------------------------
    const rivetGeom = new THREE.CylinderGeometry(0.2, 0.24, 0.09, 18);
    const rivetMat = new THREE.MeshStandardMaterial({
        color: 0xd97706, // Amber brass
        metalness: 0.92,
        roughness: 0.25,
    });

    const rivetPositions = [
        [-2.3, 1.8, 1.2],
        [2.4, -1.5, 0.9],
        [-2.1, -1.9, -0.6],
        [2.2, 2.1, -1.1],
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
    // Selvedge Orbital Tracer Ring (Double Loop ID)
    // -------------------------------------------------------------
    const ringRadius = 2.6;
    const ringCurve = new THREE.EllipseCurve(0, 0, ringRadius, ringRadius * 0.92, 0, 2 * Math.PI, false, 0);
    const ringPoints = ringCurve.getPoints(120);
    const ringGeom = new THREE.BufferGeometry().setFromPoints(ringPoints.map(p => new THREE.Vector3(p.x, p.y, 0)));

    const ringMat = new THREE.LineDashedMaterial({
        color: 0xdc2626,
        dashSize: 0.2,
        gapSize: 0.1,
        transparent: true,
        opacity: 0.85
    });
    const selvedgeRing = new THREE.Line(ringGeom, ringMat);
    selvedgeRing.computeLineDistances();
    selvedgeRing.rotation.x = Math.PI / 2.8;
    scene.add(selvedgeRing);

    // Secondary Outer Gimbal
    const outerCurve = new THREE.EllipseCurve(0, 0, 3.2, 3.2, 0, 2 * Math.PI, false, 0);
    const outerPoints = outerCurve.getPoints(90);
    const outerGeom = new THREE.BufferGeometry().setFromPoints(outerPoints.map(p => new THREE.Vector3(p.x, p.y, 0)));
    const outerMat = new THREE.LineBasicMaterial({
        color: isDark() ? 0x3f3f46 : 0xd4d4d8,
        transparent: true,
        opacity: 0.4
    });
    const outerRing = new THREE.Line(outerGeom, outerMat);
    outerRing.rotation.x = -Math.PI / 3.4;
    outerRing.rotation.y = Math.PI / 6;
    scene.add(outerRing);

    // -------------------------------------------------------------
    // High-Tensile Cotton & Carbon Fiber Floating Particles
    // -------------------------------------------------------------
    const particleCount = 80;
    const particlePositions = new Float32Array(particleCount * 3);
    const particleColors = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount; i++) {
        particlePositions[i * 3] = (Math.random() - 0.5) * 8.5;
        particlePositions[i * 3 + 1] = (Math.random() - 0.5) * 8.5;
        particlePositions[i * 3 + 2] = (Math.random() - 0.5) * 6.5;

        if (i % 4 === 0) {
            particleColors[i * 3] = 0.86;
            particleColors[i * 3 + 1] = 0.15;
            particleColors[i * 3 + 2] = 0.15;
        } else {
            const val = isDark() ? 0.75 : 0.25;
            particleColors[i * 3] = val;
            particleColors[i * 3 + 1] = val;
            particleColors[i * 3 + 2] = val;
        }
    }

    const particleGeom = new THREE.BufferGeometry();
    particleGeom.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
    particleGeom.setAttribute('color', new THREE.BufferAttribute(particleColors, 3));

    const particleMat = new THREE.PointsMaterial({
        size: 0.065,
        vertexColors: true,
        transparent: true,
        opacity: 0.8
    });

    const particles = new THREE.Points(particleGeom, particleMat);
    scene.add(particles);

    // -------------------------------------------------------------
    // Lighting Rig
    // -------------------------------------------------------------
    const ambientLight = new THREE.AmbientLight(0xffffff, isDark() ? 0.85 : 1.4);
    scene.add(ambientLight);

    const mainKeyLight = new THREE.DirectionalLight(0xffffff, isDark() ? 2.6 : 2.1);
    mainKeyLight.position.set(4, 5, 6);
    scene.add(mainKeyLight);

    const rimLight = new THREE.DirectionalLight(0xdc2626, isDark() ? 3.2 : 2.0);
    rimLight.position.set(-5, -3, -4);
    scene.add(rimLight);

    const pointerLight = new THREE.PointLight(0xef4444, isDark() ? 4.5 : 2.5, 8.5);
    pointerLight.position.set(0, 0, 3.2);
    scene.add(pointerLight);

    // -------------------------------------------------------------
    // Interaction & Animation State
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

        pointerLight.position.x = x * 3.2;
        pointerLight.position.y = y * 3.2;

        if (!isDragging) {
            targetRotationY = x * 0.7;
            targetRotationX = -y * 0.5;
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
            setTimeout(() => { if (!isDragging) isAutoRotating = true; }, 2000);
        }
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const deltaX = e.clientX - previousMousePosition.x;
        const deltaY = e.clientY - previousMousePosition.y;

        monolithGroup.rotation.y += deltaX * 0.01;
        monolithGroup.rotation.x += deltaY * 0.01;

        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    // Touch support for mobile devices
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
            setTimeout(() => { if (!isDragging) isAutoRotating = true; }, 2000);
        }
    }, { passive: true });

    window.addEventListener('touchmove', (e) => {
        if (!isDragging || e.touches.length !== 1) return;
        const deltaX = e.touches[0].clientX - previousMousePosition.x;
        const deltaY = e.touches[0].clientY - previousMousePosition.y;

        monolithGroup.rotation.y += deltaX * 0.01;
        monolithGroup.rotation.x += deltaY * 0.01;

        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, { passive: true });

    // Scroll listener for dynamic 3D camera and hardware tumbling
    window.addEventListener('scroll', () => {
        scrollYOffset = window.scrollY;
    }, { passive: true });

    // Buttons
    const wireframeBtn = document.getElementById('btn-3d-wireframe');
    if (wireframeBtn) {
        wireframeBtn.addEventListener('click', () => {
            isWireframeOnly = !isWireframeOnly;
            mesh.visible = !isWireframeOnly;
            wireframeMaterial.opacity = isWireframeOnly ? 0.95 : (isDark() ? 0.65 : 0.45);
            wireframeBtn.classList.toggle('bg-red-600', isWireframeOnly);
            wireframeBtn.classList.toggle('text-white', isWireframeOnly);
        });
    }

    const resetBtn = document.getElementById('btn-3d-reset');
    if (resetBtn) {
        resetBtn.addEventListener('click', () => {
            targetRotationX = 0;
            targetRotationY = 0;
            monolithGroup.rotation.set(0, 0, 0);
            isAutoRotating = true;
        });
    }

    // Theme Switch Observer
    const themeObserver = new MutationObserver(() => {
        const dark = isDark();
        solidMaterial.color.setHex(dark ? 0x141416 : 0xf4f4f5);
        solidMaterial.metalness = dark ? 0.88 : 0.7;
        solidMaterial.emissiveIntensity = dark ? 0.2 : 0.06;
        ambientLight.intensity = dark ? 0.85 : 1.4;
        mainKeyLight.intensity = dark ? 2.6 : 2.1;
        outerMat.color.setHex(dark ? 0x3f3f46 : 0xd4d4d8);
        wireframeMaterial.opacity = isWireframeOnly ? 0.95 : (dark ? 0.65 : 0.45);
    });
    themeObserver.observe(document.documentElement, { attributes: true, attributeFilter: ['class'] });

    // Pause rendering when outside viewport
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
    // Animation Render Loop (60 FPS)
    // -------------------------------------------------------------
    let clock = new THREE.Clock();

    function renderLoop() {
        requestAnimationFrame(renderLoop);
        if (!isVisible) return;

        const delta = clock.getDelta();
        const elapsedTime = clock.getElapsedTime();

        // Scroll influence on 3D groups
        const scrollFactor = scrollYOffset * 0.0015;
        hardwareGroup.rotation.y = scrollFactor * 1.5;
        hardwareGroup.rotation.x = scrollFactor * 0.8;

        // Tumble each individual rivet
        rivetMeshes.forEach((r, idx) => {
            r.rotation.x += delta * (0.8 + idx * 0.2);
            r.rotation.y += delta * (0.6 + idx * 0.15);
            r.position.y += Math.sin(elapsedTime * 2 + idx) * 0.002;
        });

        // Auto gentle idle rotation
        if (isAutoRotating) {
            monolithGroup.rotation.y += delta * 0.45;
            monolithGroup.rotation.x = Math.sin(elapsedTime * 0.8) * 0.12;
            monolithGroup.position.y = Math.sin(elapsedTime * 1.5) * 0.08 - (scrollFactor * 0.5);
        } else if (!isDragging) {
            monolithGroup.rotation.y += (targetRotationY - monolithGroup.rotation.y) * 0.05;
            monolithGroup.rotation.x += (targetRotationX - monolithGroup.rotation.x) * 0.05;
            monolithGroup.position.y = - (scrollFactor * 0.5);
        }

        selvedgeRing.rotation.z += delta * 0.35;
        outerRing.rotation.z -= delta * 0.2;

        particles.rotation.y += delta * 0.08;
        particles.rotation.x = Math.sin(elapsedTime * 0.3) * 0.05;

        renderer.render(scene, camera);
    }

    renderLoop();
}
