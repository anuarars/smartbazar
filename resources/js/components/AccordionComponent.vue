<template>
    <div class="accordion">
        <div class="accordion-item">
            <div class="accordion-item-header">
                Как зарегистрироваться?
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    1. В правом верхнем углу сайта найдите кнопку с иконкой пользователя. Нажмите на нее.<br>
                    2. Затем нажмите на кнопку «Зарегистрироваться».<br>
                    3. Заполните соответствующую форму.<br>
                    4. Согласитесь со всеми условиями нашего интернет-магазина.<br>
                    5. Нажмите на кнопку «Регистрация».<br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Для чего нужна регистрация?

            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    1. Добавлять товары в избранное/корзину. <br>
                    2. Оформлять заказ.<br>
                    3. Отслеживать статус заказа/историю покупок.<br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Как войти в личный аккаунт?
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    1. В правом верхнем углу сайта найдите кнопку с иконкой пользователя. <br>
                    2. Нажмите на нее. <br>
                    3. Введите номер телефона и пароль. <br>
                    4. Нажмите на кнопку «Войти». <br>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Что делать если я забыл(а) свой пароль?

            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    Если вы забыли пароль от Личного аккаунта, пройдите процедуру восстановления пароля. Для этого
                    перейдите по ссылке «Забыли пароль?» и введите номер телефона, который был указан при регистрации
                    Личного аккаунта. Затем нажмите на кнопку «Восстановить». Сообщение с новым паролем будет отправлено
                    на указанный номер.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Где посмотреть наличие товара?

            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    Есть ли товар в наличии или нет написано в карточке товара над ценой.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Где посмотреть наличие товара?

            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    Есть ли товар в наличии или нет написано в карточке товара над ценой.
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    mounted() {
        console.log('Hllo')
        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
            accordionItemHeader.addEventListener("click", () => {
                const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
                if (currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader !== accordionItemHeader) {
                    currentlyActiveAccordionItemHeader.classList.toggle("active");
                    currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
                }
                accordionItemHeader.classList.toggle("active");

                const accordionItemBody = accordionItemHeader.nextElementSibling;

                accordionItemBody.style.maxHeight = accordionItemHeader.classList.contains("active") ? accordionItemBody.scrollHeight + "px" : 0;

            });
        });

    }
}
</script>

