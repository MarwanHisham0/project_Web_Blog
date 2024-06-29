 create database Blog;

create table users(           /* create first table*/
`id` int auto_increment primary key,
`Name` varchar(255) not null,
`Email` varchar(45) not null  unique,
`Password` varchar(45) not null,
`Phone` varchar(12) unique,                     /* دا لو المستخدم مش عايز يضيف رقم الهاتف unique*/
`created_at` timestamp    default now(),       /* date and time automatic  لما أنشأ حساب يبقا متسجل ليه التاريخ والوقت الي عملت فيه حساب */
`updated_at` timestamp    default now()       /* الوقت الي عدلت فيهautomatic دا لو عدلت اي حاجه بيسجل */

);

create table Posts(                  /* create second table*/
`id` int auto_increment primary key,
`title` varchar(255) not null,
`content` text not null,
`image` varchar(255),
`created_at` timestamp    default now(),       
`updated_at` timestamp    default now(),
`user_id` int,                

constraint fk_user_id_Users foreign key (user_id) references Users(id)      /*  fk  first table */
on delete cascade 
on update cascade 
);



create table Comments(              /* create third table*/
`id` int auto_increment primary key,
`comment` text not null,
`created_at` timestamp  default now(),    
`updated_at` timestamp    default now(),
`user_id` int,                     /* للربط مابينهم Users الي ف الجدول بتاع ال id هنا بيشاور ع   */
`post_id`int,                     /* للربط مابينهم Posts الي ف الجدول بتاع ال id هنا بيشاور ع   */
  

constraint fk_user_id_Comments_Users foreign key (user_id) references Users(id)      /* fk first table       
on delete cascade                                                                      Posts مختلف عن الي ف جدولfk عشان  يبقيcomment ضيفت كلمه */
on update cascade,

constraint fk_post_id_Posts foreign key (post_id) references Posts(id)      /*  fk  second table */
on delete cascade
on update cascade
);


alter table Users
add column role enum('subscriber','admin')   default'subscriber' after phone;


alter table Users
drop column role ;
   
   
   alter table Posts
   add column created_at timestamp  default now();
   
	alter table Posts
   add column updated_at timestamp  default now();
   
    alter table users
   add column image varchar(255);