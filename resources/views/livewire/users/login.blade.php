<div class="login-main">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    @vite(['resources/css/Login/style.css', 'resources/css/Login/script.js'])
    <div class="login-info">
        <div class="hidden md:flex"
            style="height:100%; display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;">
            <div
                style="background:linear-gradient(135deg, #f6f6f6 60%, #c2fdc3 100%);border-radius:20px;width:95%;height:95%;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:40px 20px;">
                <div id="info-content"
                    style="display:flex;flex-direction:column;align-items:center;justify-content:center;">
                    <img id="info-img" src="{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}" alt="Login Info"
                        style="width:180px;height:auto;margin-bottom:32px;display:block;">
                    <h2 id="info-title"
                        style="color:#000000;font-size:1.6rem;font-weight:700;margin-bottom:12px;text-align:center;">
                        Plataforma para conectar con mentores expertos</h2>
                    <p id="info-desc"
                        style="color:#000000;font-size:1rem;opacity:0.8;margin-bottom:8px;text-align:center;">Accede a
                        sesiones en línea y mejora tu aprendizaje con la guía de profesionales</p>
                </div>
                    <div style="margin-top:24px;">
                        <span class="indicator" data-index="0"
                            style="display:inline-block;width:8px;height:8px;background:#000000;border-radius:50%;margin:0 2px;opacity:0.5;cursor:pointer;"></span>
                        <span class="indicator" data-index="1"
                            style="display:inline-block;width:8px;height:8px;background:#000000;border-radius:50%;margin:0 2px;opacity:0.5;cursor:pointer;"></span>
                        <span class="indicator" data-index="2"
                            style="display:inline-block;width:8px;height:8px;background:#000000;border-radius:50%;margin:0 2px;opacity:1;cursor:pointer;"></span>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const indicators = document.querySelectorAll('.indicator');
                            const infoImg = document.getElementById('info-img');
                            const infoTitle = document.getElementById('info-title');
                            const infoDesc = document.getElementById('info-desc');
                            const infoData = [
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    title: 'Plataforma para conectar con mentores expertos',
                                    desc: 'Accede a sesiones en línea y mejora tu aprendizaje con la guía de profesionales'
                                },
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    title: 'Encuentra el mentor ideal para cada materia',
                                    desc: 'Explora perfiles, revisa valoraciones y elige el mentor que mejor se adapte a tus necesidades.'
                                },
                                {
                                    img: '{{asset('Logos/colored/LogoTextHorizontal_nobg.png')}}',
                                    title: 'Aprende y crece desde cualquier lugar',
                                    desc: 'Conéctate en línea, resuelve tus dudas y alcanza tus objetivos académicos con MentorMap.'
                                }
                            ];
                            let currentIdx = 0;
                            function setContent(idx) {
                                indicators.forEach((i, j) => {
                                    i.style.opacity = (j === idx) ? '1' : '0.5';
                                });
                                infoImg.src = infoData[idx].img;
                                infoTitle.textContent = infoData[idx].title;
                                infoDesc.textContent = infoData[idx].desc;
                                currentIdx = idx;
                            }
                            indicators.forEach((el, idx) => {
                                el.addEventListener('click', function() {
                                    setContent(idx);
                                });
                            });
                            // Cambio automático cada 3 segundos
                            setInterval(function() {
                                let nextIdx = (currentIdx + 1) % infoData.length;
                                setContent(nextIdx);
                            }, 8000);
                        });
                    </script>
            </div>
        </div>
    </div>
    <div class="login-form-col">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Iniciar sesión</span>
                    <form action="#" wire:submit="login">
                        <div class="input-field">
                            <input wire:model="email" type="text" placeholder="Ingresa tu correo" required />
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input wire:model="password" type="password" class="password" placeholder="Ingresa tu contraseña" required />
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck" />
                                <label for="logCheck" class="text">Recuérdame</label>
                            </div>

                            <a href="#" class="text">¿Olvidaste tu contraseña?</a>
                        </div>

                        <div class="input-field button">
                            <input type="button" value="Iniciar sesión" />
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">¿No eres miembro?
                            <a href="#" class="text signup-link">Regístrate ahora</a>
                        </span>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="form signup">
                    <span class="title">Registro</span>

                    <form action="#">
                        <div class="input-field">
                            <input type="text" placeholder="Ingresa tu nombre" required />
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Ingresa tu correo" required />
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Crear una contraseña" required />
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <div class="input-field">
                            <input type="password" class="password" placeholder="Confirmar la contraseña" required />
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="termCon" />
                                <label for="termCon" class="text">Acepto todos los terminos y condiones</label>
                            </div>
                        </div>

                        <div class="input-field button">
                            <input type="button" value="Registrarse" />
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">¿Ya eres miembro?
                            <a href="#" class="text login-link">Iniciar sesión</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</div>
