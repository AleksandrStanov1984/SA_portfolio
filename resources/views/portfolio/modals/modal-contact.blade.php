{{-- resources/views/portfolio/modals/modal-contact.blade.php --}}

<style>
#contactModalBox {
    width: 720px;        /* ПК: нормальная ширина */
    max-width: 95%;      /* чтобы немного адаптировалось при уменьшении окна */
}


/* ================================
   TABLETS (до 900px)
   ================================ */
@media (max-width: 900px) {
    #contactModalBox {
        width: 90% !important;
        max-width: 90% !important;
    }
}


/* ================================
   MOBILE (до 600px)
   ================================ */
@media (max-width: 600px) {

    #contactModal {
        align-items: flex-start !important;
        padding-top: 40px !important;
    }

    #contactModalBox {
        width: 90% !important;       /* адаптивная ширина */
        max-width: 90% !important;
        padding: 20px !important;
        border-radius: 14px !important;

        max-height: 85vh;            /* чтобы форма не вылезала */
        overflow-y: auto;            /* прокрутка внутри */
    }

    #contactModalBox h3 {
        font-size: 1.2rem !important;
        margin-bottom: 12px !important;
    }

    #contactModalBox input,
    #contactModalBox select,
    #contactModalBox textarea {
        font-size: 0.95rem !important;
        padding: 10px !important;
        border-radius: 8px !important;
    }

    #contactModalBox button {
        padding: 10px !important;
        font-size: 1rem !important;
    }
}


</style>
<div id="contactModal"
     style="position:fixed;inset:0;background:rgba(0,0,0,0.55);backdrop-filter:blur(4px);
            display:none;align-items:center;justify-content:center;z-index:9999;transition:0.3s;">

    <div id="contactModalBox"
         style="background:#0f172a;border:1px solid #243045;border-radius:16px;
                padding:28px;color:white;transform:scale(0.92);transition:0.25s;">

        <h3 style="font-size:1.4rem;margin-bottom:16px;">
            @lang('portfolio.contact_form_title')
        </h3>

        <form id="contactForm"
              novalidate
              data-url="{{ route('contact.send', ['locale' => $locale]) }}"
              data-token="{{ csrf_token() }}">

            @csrf

           {{-- ---------------- NAME ---------------- --}}
           <div class="form-group" data-field="name">
               <label>@lang('portfolio.contact_form_name')</label>

               <input name="name"
                      maxlength="50"
                      class="input-field"
                      data-max="50"
                      data-counter-for="name"
                      autocomplete="off"
                      autocorrect="off"
                      autocapitalize="none"
                      spellcheck="false"
                      style="width:100%;margin-top:6px;padding:12px;border-radius:10px;
                             background:#0d1322;border:1px solid #243045;color:white;">

               <div class="field-hint">
                   <span class="char-counter" data-counter data-for="name"
                         data-max="50">0 / 50</span>
               </div>

               <div class="error-container"></div>
           </div>


            {{-- ---------------- EMAIL ---------------- --}}
            <div class="form-group" data-field="email">
                <label>@lang('portfolio.contact_form_email')</label>

                <input name="email"
                       type="email"
                       maxlength="50"
                       class="input-field"
                       data-max="50"
                       data-counter-for="email"
                       style="width:100%;margin-top:6px;padding:12px;border-radius:10px;
                              background:#0d1322;border:1px solid #243045;color:white;">

                <div class="field-hint">
                    <span class="char-counter" data-counter data-for="email"
                          data-max="50">0 / 50</span>
                </div>

                <div class="error-container"></div>
            </div>

            {{-- ---------------- PHONE ---------------- --}}
            <div class="form-group" data-field="phone">
                <label>@lang('portfolio.contact_form_phone')</label>

                <input name="phone"
                       id="contactPhone"
                       maxlength="15"
                       placeholder="+49010000001"
                       class="input-field"
                       data-max="15"
                       data-counter-for="phone"
                       style="width:100%;margin-top:6px;padding:12px;border-radius:10px;
                              background:#0d1322;border:1px solid #243045;color:white;">

                <div class="field-hint">
                    <span class="char-counter" data-counter data-for="phone"
                          data-max="15">0 / 15</span>
                </div>

                <div class="error-container"></div>
            </div>

            {{-- ---------------- TOPIC ---------------- --}}
            <div class="form-group" data-field="topic">
                <label>@lang('portfolio.contact_form_topic')</label>

                <select name="topic"
                        class="input-field"
                        style="width:100%;margin-top:6px;padding:12px;border-radius:10px;
                               background:#0d1322;border:1px solid #243045;color:white;">

                    <option value="">@lang('portfolio.contact_form_topic')</option>
                    <option value="landing">@lang('portfolio.contact_topic_landing')</option>
                    <option value="portfolio">@lang('portfolio.contact_topic_portfolio')</option>
                    <option value="corporate">@lang('portfolio.contact_topic_corporate')</option>
                    <option value="shop">@lang('portfolio.contact_topic_shop')</option>
                    <option value="redesign">@lang('portfolio.contact_topic_redesign')</option>
                    <option value="other">@lang('portfolio.contact_topic_other')</option>
                </select>

                <div class="error-container"></div>
            </div>

            {{-- ---------------- MESSAGE ---------------- --}}
            <div class="form-group" data-field="message">
                <label>@lang('portfolio.contact_form_message')</label>

                <textarea name="message"
                          maxlength="250"
                          class="input-field"
                          data-max="250"
                          data-counter-for="message"
                          style="width:100%;height:150px;margin-top:6px;padding:12px;
                                 background:#0d1322;border:1px solid #243045;color:white;
                                 border-radius:10px;"></textarea>

                <div class="field-hint">
                    <span class="char-counter" data-counter data-for="message"
                          data-max="250">0 / 250</span>
                </div>

                <div class="error-container"></div>
            </div>

            {{-- HONEYPOT --}}
            <input type="text" name="hp_secret" style="display:none;">

            {{-- SUBMIT --}}
            <button type="submit"
                    style="margin-top:16px;width:100%;padding:12px;border-radius:12px;
                           background:linear-gradient(90deg,#3b82f6,#6366f1);
                           color:white;border:none;font-size:1.05rem;cursor:pointer;">
                @lang('portfolio.contact_form_send')
            </button>
        </form>

        <button id="contactCloseBtn"
                style="margin-top:12px;width:100%;padding:10px;border:none;background:#1e293b;
                       border-radius:10px;color:white;cursor:pointer;">
            @lang('portfolio.modal_close')
        </button>

    </div>
</div>
