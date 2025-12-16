{{-- resources/views/portfolio/modals/modal-templates.blade.php --}}

<div style="display:none;">

    <div id="modal-szua" class="project-modal-template">
        {!! __('portfolio.modal_szua_html') !!}
    </div>

    <div id="modal-sohonet" class="project-modal-template">
        {!! __('portfolio.modal_sohonet_html') !!}
    </div>

    <div id="modal-arven" class="project-modal-template">
        {!! __('portfolio.modal_arven_html') !!}
    </div>

    <div id="modal-mrs" class="project-modal-template">
        {!! __('portfolio.modal_mrs_html') !!}
    </div>

    <div id="modal-zeo" class="project-modal-template">
        {!! __('portfolio.modal_grain_html') !!}
    </div>

    <div id="modal-creedle" class="project-modal-template">
        {!! __('portfolio.modal_creedle_html') !!}
    </div>

</div>

<style>
    /* ====================================================
       PROJECT MODALS — FIX FOR MOBILE SCROLL & ADAPTIVE
       ==================================================== */

    /* Оверлей */
  #project-modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.55);
      backdrop-filter: blur(6px);
      z-index: 9999;

      /* САМЫЙ ВАЖНЫЙ МОМЕНТ: НЕ ДЕЛАЕМ ЕГО ВИДИМЫМ */
      display: none;

      overflow-y: auto !important;
      -webkit-overflow-scrolling: touch !important;
      padding: 30px 0;
  }


#project-modal-panel {
    width: 820px;
    max-width: 95%;
    margin: 0 auto;

    background: #020617;
    border-radius: 24px;
    border: 1px solid #1f2937;
    padding: 48px;

    box-sizing: border-box;

    overflow-y: auto;
    -webkit-overflow-scrolling: touch;

    max-height: none !important; /* ПК — без ограничений */
}




    @media (max-width: 600px) {

        #project-modal-backdrop {
            padding: 20px 0 !important;
        }

        #project-modal-panel {
            width: 90% !important;
            max-width: 90% !important;

            max-height: 85vh !important; /* только на мобилках */
            padding: 24px !important;
        }
    }



</style>
