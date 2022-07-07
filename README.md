<h1>EmailSender</h1>
<p>Система рассылки, в которую входят: виртуальный или физический сервер для 
 связи с клиентскими машинами и синхронизации адресных книг; модуль 
 экспорта/импорта для передачи адресных книг в сервис рассылки; веб-приложение
 по созданию и отправке e-mail рассылок. </p>
 
 <h2>Назначение</h2>
 <p>Автоматизация и упрощение рассылок полезной информации клиентам 
 компании, к примеру: отправка прайс-листов, новостей, информационных 
 сообщений.</p>
 <p>Настройки и возможности системы не подразумевают рассылку спама. 
 При использовании EmailSender с этой целью стабильная и правильная работа 
 не гарантируется.</p>
 
 <h2>Компоненты</h2>
 <ul>
    <li>VirtualBox</li>
    <li>Synology DSM 6.2.3</li>
    <li>CardDav Export</li>
    <li>Laravel 9</li>
 </ul>
 
 <h3>VirtualBox</h3>
 <p>Виртуализация на VirtualBox не является обязательной. Возможно 
 использование других средств. Вы также можете развернуть Synology DSM на 
 реальном сервере или использовать NAS Synology. В случае последнего 
 варианта, можно пропустить этапы настройки VirtualBox.</p>
 <p>Инструкции по настройке и установке <a href="https://github.com/vltolstov/EmailSender/tree/master/VirtualBox">здесь</a></p>
 
 
 <h3>Synology DSM 6.2.3</h3>
 <p>Операционная система DSM позволяет легко развернуть и управлять на 
 сервере CardDav протокол для хранения адресных книг и контактов. Версия 
 6.2.3 выбрана как последняя, наиболее стабильная в среде VirtualBox. В 
 случае использования других серверов, возможно использование DSM 7-ых 
 версий.</p>
 <p>Инструкции по настройке и установке <a href="https://github.com/vltolstov/EmailSender/tree/master/Synology">здесь</a></p>
 
 
 <h3>Synology Contacts</h3>
 <p>Пакет - основа для CardDav протокола и веб-интерфейс 
 для управления контактами и адресными книгами.</p>
<p>Инструкции по настройке <a href="https://github.com/vltolstov/EmailSender/tree/master/SynologyContacts">здесь</a></p>
 
 
 <h3>CardDav Export</h3>
 <p>Связка адресных книг с веб-приложением</p>
 <p>Является прототипом. Полностью рабочий код находится !!!здесь!!!</p>
 
 <h3>Laravel 9</h3>
 <p>Веб-приложение основано на фрэймворке Laravel 9. При необходимости
  может быть перенесено и настроено для работы с другими фрейворками.</p>