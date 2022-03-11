alter table users
    add(
        user_activity binary not null,
        user_entr timestamp,
        user_registration timestamp default now()
    )