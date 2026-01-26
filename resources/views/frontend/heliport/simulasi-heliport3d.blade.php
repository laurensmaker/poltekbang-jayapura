
@extends('frontend.layouts.main')
@section('content')

<section class="form-contact-2">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="section-capture">
                    <div class="section-title">
                        <span class="sub-title">Belajar</span>
                        <h2><span>Simulasi Heliport 3D</span></h2>
                    </div>
                </div>

                <div class="form-warp contact-detail">
                    <div class="contact-form-list">
                        <div class="container my-4">

                            <form id="heliportForm">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Nama Heliport</label>
                                        <input type="text" id="namaHeliport" value="PPJ" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Panjang TLOF (m)</label>
                                        <input type="number" id="tlof" value="9" step="0.1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Panjang FATO (m)</label>
                                        <input type="number" id="fato" value="15" step="0.1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Safety Area (m)</label>
                                        <input type="number" id="safety" value="3" step="0.1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Heading (°)</label>
                                        <input type="number" id="heading" value="0" step="1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Skala (px/m)</label>
                                        <input type="number" id="scale" value="1" step="0.1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Warna Permukaan</label>
                                        <input type="color" id="warna" value="#2e8b57" class="form-control form-control-color">
                                    </div>

                                </div>

                                <button type="button" id="generate" class="btn btn-primary mt-3">
                                    Generate Simulasi 3D
                                </button>

                            </form>

                            <hr>

                            <h5>Preview Simulasi 3D</h5>

                            <div id="canvas3d" style="width:100%;height:500px;border:1px solid #ccc"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ===== THREE JS CDN ===== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r152/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r152/examples/js/controls/OrbitControls.js"></script>

<script>
let scene, camera, renderer, controls, heliGroup;

init();

function init(){
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xf2f2f2);

    const width = document.getElementById('canvas3d').clientWidth;
    const height = 500;

    camera = new THREE.PerspectiveCamera(45, width/height, 0.1, 1000);
    camera.position.set(20, 20, 20);

    renderer = new THREE.WebGLRenderer({antialias:true});
    renderer.setSize(width, height);
    document.getElementById('canvas3d').appendChild(renderer.domElement);

    controls = new THREE.OrbitControls(camera, renderer.domElement);

    // Lighting
    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(20,20,10);
    scene.add(light);

    const ambient = new THREE.AmbientLight(0x888888);
    scene.add(ambient);

    // Ground grid
    const grid = new THREE.GridHelper(100, 100);
    scene.add(grid);

    animate();
}

function animate(){
    requestAnimationFrame(animate);
    renderer.render(scene,camera);
}

// BUTTON ACTION
document.getElementById('generate').addEventListener('click', generateHeliport);

function generateHeliport(){

    if(heliGroup) scene.remove(heliGroup);

    heliGroup = new THREE.Group();

    const tlof = parseFloat(tlof.value);
    const fato = parseFloat(fato.value);
    const safety = parseFloat(safety.value);
    const heading = parseFloat(document.getElementById('heading').value) * Math.PI/180;
    const warna = document.getElementById('warna').value;

    // MATERIAL
    const matSurface = new THREE.MeshPhongMaterial({color: warna});
    const matFato = new THREE.MeshPhongMaterial({color: 0xffffff});
    const matSafety = new THREE.MeshPhongMaterial({color: 0xdddddd});
    const matRing = new THREE.MeshPhongMaterial({color: 0xffff00});

    // SAFETY AREA (Kotak)
    const safetyMesh = new THREE.Mesh(
        new THREE.BoxGeometry(fato + (safety*2), 0.2, fato + (safety*2)),
        matSafety
    );
    heliGroup.add(safetyMesh);

    // FATO (Kotak Putih)
    const fatoMesh = new THREE.Mesh(
        new THREE.BoxGeometry(fato,0.3,fato),
        matFato
    );
    heliGroup.add(fatoMesh);

    // TLOF (Kotak Hijau)
    const tlofMesh = new THREE.Mesh(
        new THREE.BoxGeometry(tlof,0.4,tlof),
        matSurface
    );
    heliGroup.add(tlofMesh);

    // RING KUNING (Kotak sedikit lebih besar)
    const ringMesh = new THREE.Mesh(
        new THREE.BoxGeometry(tlof+1,0.41,tlof+1),
        matRing
    );
    heliGroup.add(ringMesh);

    // HURUF H
    const hMat = new THREE.MeshPhongMaterial({color:0xffffff});
    const bar1 = new THREE.Mesh(new THREE.BoxGeometry(0.3,0.6,3), hMat);
    const bar2 = new THREE.Mesh(new THREE.BoxGeometry(0.3,0.6,3), hMat);
    const mid = new THREE.Mesh(new THREE.BoxGeometry(2,0.6,0.3), hMat);

    bar1.position.set(-1,0.6,0);
    bar2.position.set(1,0.6,0);
    mid.position.set(0,0.6,0);

    heliGroup.add(bar1);
    heliGroup.add(bar2);
    heliGroup.add(mid);

    // TEXT NAMA
    const loader = new THREE.FontLoader();
    loader.load("https://threejs.org/examples/fonts/helvetiker_regular.typeface.json", function(font){
        const textGeo = new THREE.TextGeometry(
            document.getElementById('namaHeliport').value,
            {size:1,height:0.2,font:font}
        );
        const textMesh = new THREE.Mesh(textGeo,new THREE.MeshPhongMaterial({color:0x000000}));
        textMesh.position.set(-3,1.2, tlof/2 + 1);
        heliGroup.add(textMesh);
    });

    // ROTASI HEADING
    heliGroup.rotation.y = heading;

    scene.add(heliGroup);
}
</script>





@endsection
