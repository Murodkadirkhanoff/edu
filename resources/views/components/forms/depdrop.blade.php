@props([
    'roots',              // [id ⇒ title]
    'subs',               // [parent_id ⇒ [sub_id ⇒ title]]
    'rootName' => 'category_id',
    'subName'  => 'subcategory_id',
    'course' => null,
    'category_id' => null,
    'subcategory_id' => null
])

@php
    $id      = 'dd_' . uniqid();   // уникальный префикс
    $oldRoot = old($rootName, $category_id);
    $oldSub  = old($subName, $subcategory_id);
@endphp

<div id="{{ $id }}" class="depdrop" data-subs='@json($subs)'>
    {{-- Корневая категория --}}
    <div class="row mb-3">
        <label for="{{ $id }}_root" class="col-sm-4 col-form-label">Категория</label>
        <div class="col-sm-8">
            <select name="{{ $rootName }}" id="{{ $id }}_root" class="form-select" required>
                <option value="">— Категорияни танланг —</option>
                @foreach($roots as $rootId => $title)
                    <option value="{{ $rootId }}" @selected($rootId == $oldRoot)>{{ $title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Подкатегория --}}
    <div class="row mb-3">
        <label for="{{ $id }}_sub" class="col-sm-4 col-form-label">Қуйи категория</label>
        <div class="col-sm-8">
            <select name="{{ $subName }}" id="{{ $id }}_sub" class="form-select"
                    data-old="{{ $oldSub }}" {{ $oldRoot ? '' : 'disabled' }} required>
                <option value="">
                    {{ $oldRoot ? '— Қуйи категорияни танланг —' : '— Аввал категорияни танланг —' }}
                </option>
            </select>
        </div>
    </div>
</div>

{{-- скрипт подключаем единожды --}}
@once
    @push('scripts')
        <script>
            /**
             * Инициализируем все .depdrop после загрузки DOM.
             * Если есть Choices.js — используем его API.
             */
            document.addEventListener('DOMContentLoaded', () => {

                const hasChoices = typeof window.Choices !== 'undefined';

                /** Создаём Choices и возвращаем инстанс, либо сам select */
                const buildChoices = el =>
                    hasChoices
                        ? new Choices(el, { shouldSort: false, searchEnabled: false })
                        : el;

                document.querySelectorAll('.depdrop').forEach(wrapper => {
                    const subs = JSON.parse(wrapper.dataset.subs || '{}');

                    // элементы
                    const rootSel = wrapper.querySelector(`#${wrapper.id}_root`);
                    const subSel  = wrapper.querySelector(`#${wrapper.id}_sub`);
                    const oldSub  = subSel.dataset.old;

                    // Choices-обёртки (или сами <select>)
                    const root = buildChoices(rootSel);
                    let   sub  = buildChoices(subSel);  // может быть пересоздан

                    /** заполняем / очищаем список подкатегорий */
                    const fillSubs = parentId => {

                        // Если нет дочерних ─ блокируем
                        if (!parentId || !subs[parentId]) {
                            if (hasChoices) {
                                sub.clearStore();
                                sub.disable();
                                sub.setChoices([{value:'',label:'— Аввал категорияни танланг —'}], 'value', 'label', true);
                            } else {
                                subSel.innerHTML = '<option value="">— сначала категория —</option>';
                                subSel.disabled = true;
                            }
                            return;
                        }

                        // Формируем массив объектов для Choices или <option>
                        const items = [{value:'',label:'— Қуйи категорияни танланг —'}];

                        Object.entries(subs[parentId]).forEach(([id, text]) =>
                            items.push({ value:id, label:text, selected:id === oldSub })
                        );

                        if (hasChoices) {
                            sub.enable();
                            sub.clearStore();
                            sub.setChoices(items, 'value', 'label', true);
                        } else {
                            // обычный select
                            subSel.disabled = false;
                            subSel.innerHTML = '';
                            items.forEach(({value,label,selected}) => {
                                const opt = new Option(label, value, false, selected);
                                subSel.append(opt);
                            });
                        }
                    };

                    // слушатель изменения корневой категории
                    rootSel.addEventListener('change', e => fillSubs(e.target.value));

                    // автозаполнение при редактировании формы
                    if (rootSel.value) fillSubs(rootSel.value);
                });
            });
        </script>
    @endpush
@endonce
