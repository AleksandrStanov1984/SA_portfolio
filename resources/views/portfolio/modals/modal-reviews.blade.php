{{-- resources/views/portfolio/modals/modal-reviews.blade.php --}}

<style>
    /* ==========================================
       REVIEW MODAL — DESKTOP DEFAULT WIDTH
       ========================================== */

    #reviewModalBox {
        width: 720px;      /* ПК — нормальная ширина */
        max-width: 95%;    /* чтобы слегка адаптировался */
    }


    /* ==========================================
       TABLETS (до 900px)
       ========================================== */

    @media (max-width: 900px) {
        #reviewModalBox {
            width: 90% !important;
            max-width: 90% !important;
        }
    }


    /* ==========================================
       MOBILE (до 600px)
       ========================================== */

    @media (max-width: 600px) {

        #reviewModal {
            align-items: flex-start !important;
            padding-top: 40px !important;
        }

        #reviewModalBox {
            width: 90% !important;
            max-width: 90% !important;
            padding: 20px !important;
            border-radius: 14px !important;

            max-height: 85vh;     /* чтобы форму можно было листать */
            overflow-y: auto;
        }

        #reviewModalBox h3 {
            font-size: 1.2rem !important;
            margin-bottom: 12px !important;
        }

        #reviewModalBox input,
        #reviewModalBox textarea {
            font-size: 0.95rem !important;
            padding: 10px !important;
            border-radius: 8px !important;
        }

        #reviewModalBox button {
            padding: 10px !important;
            font-size: 1rem !important;
        }

        /* звёздочки меньшего размера */
        #reviewModalBox .star-btn-modal {
            font-size: 1.35rem !important;
        }
    }
</style>

<div id="reviewModal"
     style="position:fixed; inset:0; background:rgba(0,0,0,0.55); backdrop-filter:blur(4px);
            display:none; align-items:center; justify-content:center; z-index:9999; transition:0.3s;">

    <div id="reviewModalBox"
         style="background:#0f172a; border:1px solid #243045; border-radius:16px;
                padding:28px; color:white; transform:scale(0.92); transition:0.25s;">

        <h3 style="font-size:1.4rem; margin-bottom:16px;">
            @lang('portfolio.reviews_form_title')
        </h3>

        {{-- КНОПКА ОТКРЫТИЯ (ИДЕАЛЬНО ВЫНЕСТИ ВНЕ МОДАЛКИ, НО МОЖНО И ТАК) --}}
        {{--
           <button id="openReviewModal">Открыть</button>
           Этот ID обязательно должен быть на той кнопке, которая открывает форму
        --}}

        <form id="reviewForm"
              method="POST"
              action="{{ route('reviews.store', ['locale' => app()->getLocale()]) }}">

            @csrf

            {{-- Имя --}}
            <label>@lang('portfolio.reviews_name_label')</label>
            <input name="name"
                   style="width:100%; margin:6px 0 12px; padding:12px; border-radius:10px;
                          background:#0d1322; border:1px solid #243045; color:white;">


            {{-- Рейтинг --}}
            <label>@lang('portfolio.reviews_rating_label')</label>

            <div style="display:flex; gap:8px; margin:6px 0 12px;">
                @for($i = 1; $i <= 5; $i++)
                    <button type="button"
                            class="star-btn-modal"
                            data-value="{{ $i }}"
                            style="background:transparent; border:none; font-size:1.6rem;
                                   color:#475569; cursor:pointer;">
                        ★
                    </button>
                @endfor
            </div>

            {{-- ВАЖНО: начальное значение 1, иначе Laravel вернёт ошибку валидации --}}
            <input type="hidden" id="ratingModal" name="rating" value="0">


            {{-- Комментарий --}}
            <label>@lang('portfolio.reviews_comment_label')</label>
            <textarea name="comment" required maxlength="250"
                      style="width:100%; height:150px; margin-top:6px; padding:12px;
                             background:#0d1322; border:1px solid #243045;
                             color:white; border-radius:10px;"></textarea>


            {{-- Submit --}}
            <button type="submit"
                    style="margin-top:16px; width:100%; padding:12px; border-radius:12px;
                           background:linear-gradient(90deg,#3b82f6,#6366f1);
                           color:white; border:none; font-size:1.05rem; cursor:pointer;">
                @lang('portfolio.reviews_submit')
            </button>

        </form>

        {{-- Закрыть --}}
        <button id="closeModal"
                style="margin-top:12px; width:100%; padding:10px; border:none;
                       background:#1e293b; border-radius:10px; color:white; cursor:pointer;">
            @lang('portfolio.modal_close')
        </button>

    </div>
</div>
