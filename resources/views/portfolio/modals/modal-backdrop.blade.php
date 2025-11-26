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
        const content = document.getElementById('project-modal-content');
        const backdrop = document.getElementById('project-modal-backdrop');

        if (template) content.innerHTML = template.innerHTML;

        backdrop.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeProjectModal() {
        const backdrop = document.getElementById('project-modal-backdrop');
        backdrop.style.display = 'none';
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-modal-id]').forEach(el => {
            el.addEventListener('click', () =>
                openProjectModal(el.dataset.modalId)
            );
        });
    });
</script>
