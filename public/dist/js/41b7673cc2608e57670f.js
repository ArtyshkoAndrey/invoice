"use strict";
/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_lang_ru_json"],{

/***/ "./resources/js/lang/ru.json":
/*!***********************************!*\
  !*** ./resources/js/lang/ru.json ***!
  \***********************************/
/***/ ((module) => {

module.exports = JSON.parse('{"comment_config":"Config - language and theme switcher","config":{"theme":{"dark":"Тёмная","light":"Светлая"},"loading":"Загрузка..."},"comment_menu":"Items in menu","menu":{"invoice":{"title":"Заявки"},"resorts":{"title":"Курорты"},"airports":{"title":"Аэропорты"},"hotels":{"title":"Отели"},"room_types":{"title":"Типы комнат"},"companies":{"title":"Компании"},"samples":{"title":"Шаблоны"},"project":{"name":"Название компании"},"transports":{"title":"Транспорт"},"users":{"title":"Пользователи"}},"comment_header_filter":"Header Filter components","header_filter":{"length_label":"Показать по","length_placeholder":"Кол-во","create_button":"Создать","search_placeholder":"Поиск"},"comment_invoice":"Invoice pages","invoice":{"history":"История","index":{"title":"Список заявок","filter_title":"Заявки","table":{"titles":{"company":"Компания","client":"Клиент","transfer":"Трансфер"},"arrival_time":"Прибытие","departure_time":"Отбытие"}},"show":{"title":{"info_client":"Информация о клиенте","info_hotels":"Данные отеля","info_hotel":"Данные отелей","hotline":"Хотлайн","cost":"Цена","transfer":"Трансфер","schedule":"Расписание"},"hotel":"Отель","room":"Комната","count":"Кол-во","adults":"Взрослые","children":"Дети","check_in":"Чек ин","check_out":"Чек аут","number_booking":"Номер брони","transport":"Транспорт","from":"Откуда","where":"Куда","count_sits":"Кол-во мест","arrival_time":"Время прилёта","departure_time":"Время отлёта","flight_code":"Код рейса","gid":"Гид","day":"День"},"create":{"words":{"step":"Шаг","in":"из"},"step_1":{"title":"Компания"},"step_2":{"title":"Данные пользователя"},"step_3":{"title":"Данные отелей","date_title":"Время проживания"},"step_4":{"title":"Трансфер"},"step_5":{"title":"Программа","template":{"title":"Выберите шаблон","done":"Готово"}},"step_6":{"title":"Хотлайн"}},"buttons":{"next":"Далее","add_hotel":"Добавить отель","choose_template":"Добавить из шаблона","create_new_template":"Создать новый"},"inputs":{"company_name":"Название компании","company_ref":"Reference","user":{"name":"Имя клиента","nationality":"Национальность"},"hotel_name":"Наименование отеля","room_type":"Тип комнаты","countable":"Кол-во","extra_bed":"Extra bed","adults":"Взрослые","children":"Дети","bb":"BB","check_in":"Чек ин","check_out":"Чек аут","booking_number":"Номер бронирования","arrival_time":"Время прилёта","arrival_flight_code":"Код полёта","departure_time":"Время отлёта","departure_flight_code":"Код полёта","driver_number":"Номер водителя","driver_name":"Имя водителя","passengers":"Пассажиры","airport":"Аэропорт","gid":"Гид","transport":"Транспорт","hotline":{"cost":"Стоимость","phone":"Номер телефона"}},"errors":{"company":"Необходимо выбрать компанию","user":{"name":"Необходимо ввести имя клиента","nationality":"Необходимо ввести национальность клиента"},"validateInputs":{"title":"Ошибка введённых данных","text":"Вы ввели не все данные чтобы перейти на следующий шаг"}}},"comment_resorts":"Resorts pages","resorts":{"index":{"title":"Список курортов","filter_title":"Курорты"},"edit-modal":{"title":"Редактирование курорта"},"create-modal":{"title":"Создание курорта"}},"comment_transport":"Transport pages","transports":{"index":{"title":"Список транспортов","filter_title":"Транспорт"},"edit-modal":{"title":"Редактирование транспорта"},"create-modal":{"title":"Создание транспорта"}},"comment_airports":"Airports pages","airports":{"index":{"title":"Список Аэропортов","filter_title":"Аэропорты"},"edit-modal":{"title":"Редактирование аэропорта"},"create-modal":{"title":"Добавление аэропорта"}},"comment_room_types":"Room Types pages","room_types":{"index":{"title":"Список типов комнат","filter_title":"Типы комнат"},"edit-modal":{"title":"Тип комнаты "},"create-modal":{"title":"Добавление нового типа комнаты"}},"comment_users":"Users pages","users":{"index":{"title":"Список пользователетй","filter_title":"Пользователи"},"edit-modal":{"title":"Пользователь "},"create-modal":{"title":"Добавить пользователя"}},"comment_companies":"Companies pages","companies":{"index":{"title":"Список компаний","filter_title":"Компании"},"edit-modal":{"title":"Компания "},"create-modal":{"title":"Добавление новой компании"}},"comment_hotels":"Companies pages","hotels":{"index":{"title":"Список отелей","filter_title":"Отели"},"edit-modal":{"title":"Отель "},"create-modal":{"title":"Добавление нового отеля"}},"comment_samples":"Companies pages","samples":{"index":{"title":"Список шаблонов","filter_title":"Шаблоны"},"edit":{"title":"Редактирование шаблона","day":"День {number}","free_day":"Free","half_day":"Half day","add_day":"Добавить день"},"edit-modal":{"title":"Шаблон "},"create-modal":{"title":"Добавление нового шаблона"}},"login":{"title":"Вход в аккаунт сотрудника"},"password_forgot":{"title":"Востановление пароля сотрудника"},"reset_password":{"title":"Востановление пароля сотрудника"},"comment_auth":"Buttons and label in auth routes","auth":{"login":"Вход","in_login":"Войти","logout":"Выйти","reset":"Сбросить","reset_password":{"reset_link":"Забыли пароль?"},"errors":{"password":{"length":{"min":"Менее {length} символов","max":"Более {length} символов"}},"password_confirmation":"Пароли не совпадают","email":{"valid":"Email введён неправильно"}},"success":{"email":{"valid":"Email введён правильно"}}},"comment_notification":"Translate Notify Text","notification":{"delete":{"success":{"title":"{name} успешно удалён","text":"Вы успешно удалили \'{name}\' из базы данных, возврат действий невозможен"},"danger":{"title":"Ошибка при удалении","text":"Сервер не смог удалить выбранные данные. Обратитесь к администратора, или обновите страницу","user-delete":"Вы не пожете удалить сами сабя"}},"get":{"danger":{"title":"Ошибка в получении данных","text":"Сервер не смог ответить на ваш вопрос. Перезагрузите страницу"}},"email_send":{"title":"Загляните в почтовый ящик","text":"Для сброса пороля, передите в ящик вашего аккаунта. Передите по ссылку и введите новый пароль."},"resetting_password":{"title":"Пароль успешно изменён"}},"form":{"save":"Сохранить","cancel":"Отмена","edit":"Изменить","delete":"Удалить","inputs":{"name":{"placeholder":"Наименование"},"code":{"placeholder":"Код"},"email":{"placeholder":"Email"},"password":{"placeholder":"Пароль"},"password_confirmation":{"placeholder":"Повторите пароль"}},"title":{"edit":"Update item"}}}');

/***/ })

}]);