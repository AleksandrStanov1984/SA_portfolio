{{-- resources/views/portfolio/modals/modal-backdrop.blade.php --}}

<div id="project-modal-backdrop" style="
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    background:rgba(15,23,42,0.92);
    backdrop-filter:blur(10px);
    z-index:60;
">
    <div id="project-modal-panel" style="
        max-width: 1350px;
        width: 100%;
        margin: 24px;
        border-radius: 24px;
        background: #020617;
        border: 1px solid #1f2937;
        box-shadow: 0 0 40px rgba(0,0,0,0.4);
        padding: 48px;
        position: relative;
    ">

        <button onclick="closeProjectModal()" style="
            position:absolute;
            top:16px;right:16px;
            background:#1e293b;
            border:none;border-radius:50%;
            width:36px;height:36px;color:white;
            cursor:pointer;
        ">×</button>

        <div id="project-modal-content" style="
            color: #e2e8f0;
            font-size: 1.45rem;
            line-height: 1.95;
        "></div>

    </div>
</div>

<script>
    function openProjectModal(id) {
        const template = document.getElementById(id);
        const content  = document.getElementById('project-modal-content');
        const backdrop = document.getElementById('project-modal-backdrop');

        if (template && content) {
            content.innerHTML = template.innerHTML;
        }

        backdrop.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeProjectModal() {
        const backdrop = document.getElementById('project-modal-backdrop');
        const panel    = document.getElementById('project-modal-panel');

        // сбрасываем возможный трансформ после свайпа
        if (panel) {
            panel.style.transition = '';
            panel.style.transform  = '';
        }

        backdrop.style.display = 'none';
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const backdrop = document.getElementById('project-modal-backdrop');
        const panel    = document.getElementById('project-modal-panel');

        // Открытие по клику на карточки
        document.querySelectorAll('[data-modal-id]').forEach(el => {
            el.addEventListener('click', () => {
                openProjectModal(el.dataset.modalId);
            });
        });

        // === Закрытие по клику на фон ===
        if (backdrop) {
            backdrop.addEventListener('click', (event) => {
                // Закрываем только если кликнули именно по фону, а не по контенту
                if (event.target === backdrop) {
                    closeProjectModal();
                }
            });
        }

        // === Свайп вниз для закрытия на мобильных ===
        if (panel) {
            let startY = null;
            let currentY = null;
            const THRESHOLD = 80; // минимум пикселей для закрытия

            panel.addEventListener('touchstart', (e) => {
                if (!e.touches || e.touches.length === 0) return;
                startY = e.touches[0].clientY;
                currentY = startY;
                panel.style.transition = 'none';
            }, { passive: true });

            panel.addEventListener('touchmove', (e) => {
                if (startY === null) return;
                currentY = e.touches[0].clientY;
                const delta = currentY - startY;

                // тянем только вниз
                if (delta > 0) {
                    panel.style.transform = `translateY(${delta}px)`;
                }
            }, { passive: true });

            panel.addEventListener('touchend', () => {
                if (startY === null) return;

                const delta = currentY - startY;

                panel.style.transition = 'transform 0.2s ease';

                if (delta > THRESHOLD) {
                    // достаточно потянули вниз — закрываем
                    panel.style.transform = `translateY(100vh)`;
                    setTimeout(() => {
                        closeProjectModal();
                    }, 180);
                } else {
                    // вернём панель назад
                    panel.style.transform = 'translateY(0)';
                }

                startY = null;
                currentY = null;
            });
        }
    });
</script>

