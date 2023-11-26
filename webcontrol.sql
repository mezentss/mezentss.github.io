create table flowers
(
    id          int          not null
        primary key,
    description varchar(120) not null,
    photo       varchar(20)  not null,
    price       int          not null
)
    charset = utf8mb3;

create table count
(
    id              int          not null
        primary key,
    quantity        int          null,
    characteristics varchar(200) null,
    constraint count_flowers_id_fk
        foreign key (id) references flowers (id)
);

create table users
(
    id       int auto_increment
        primary key,
    username varchar(50)  not null,
    password varchar(255) not null
);

insert into webcontrol.count (id, quantity, characteristics)
values  (1, 13, 'Стильно, модно, молодёжно'),
        (2, 11, 'Стильно, модно, молодёжно'),
        (3, 12, 'Стильно, модно, молодёжно'),
        (4, 10, 'Стильно, модно, молодёжно'),
        (5, 5, 'Стильно, модно, молодёжно'),
        (6, 15, 'Стильно, модно, молодёжно');

insert into flowers (id, description, photo, price)
values  (1, 'Чудесный весенний букет с нежными белыми и желтыми хризантемами.', '1.jpg', 5000),
        (2, 'Крупные персиковые пионовидные розы точно не оставят равнодушной свою обладательницу!', '2.jpg', 4200),
        (3, 'Нежная классика: розовые розы всегда остаются беспроигрышным вариантом в качестве подарка.', '3.jpg', 4600),
        (4, 'Пастельные мечты: сочетание хризантем и кустовидных роз йогуртовых оттенков.', '4.jpg', 3900),
        (5, 'Пастельные мечты BigSize. Для тех, кто УМЕЕТ радовать.', '5.jpg', 6100),
        (6, 'Для ценителей необычных букетов представляем сочетание ярких ирисов со вставками голубых сухоцветов!', '6.jpg', 5200);

insert into webcontrol.users (id, username, password)
values  (1, '123', '123'),
        (2, 'sofya.mezentseva@list.ru', '123'),
        (3, '1234', '1234'),
        (4, '666', '666');