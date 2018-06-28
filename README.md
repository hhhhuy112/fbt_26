# Framgia Booking tours
## [Admin]
- Manage User
- Manage Tour
- Manage booking requests
- Manage user reviews
- Manage revenue
- Manage category

## [Guess]
- View tour
- View review about place, food, news 
- Search tour
- Register account

## [User]
- View tour
- Booking tour
- Payment tour by internet banking
- Sign in, sign out
- Can authenticate via Facebook, Twitter, Google
- Manage user bank account
- View review about place, food, news 
- Search tour
- Manage profile
- Manage review of themself
- Comment a review, Comment a comment
- Like review
- Rating a tour

## [Activity]
- Booking tour
- Cancel tour
- Create new review
- User pay tour

# Step by step
1. Design database
2. Add tasks on redmine + estimate time
3. Init project
4. Init models, add relationship
5. Design static pages
6. Signup / Login / Logout
7. Other pulls

# Step to update task on redmine
1. Change Status to "In Progress", "Due date"
2. Update  "Spent time", "% Done (100)",  before send pull request to trainer 
3. If trainer COMMENT, change "% Done (80)", after that continue to fix comment; if not, move to step 4
4. After MERGED, update task infomation "spent time", "% Done (100)", Status to "Resolved" 

# Notice: 
Trừ pull init project và init model, các pull khác không quá 15 files thay đổi
Các bạn trong team review chéo cho nhau + comment OK vào pull sau khi review xong mà không có lỗi nào

# [Framgia Coding Standard PHP]
https://github.com/framgia/coding-standards/tree/master/vn/php

# PHP-Code-Sniffer check code convention with Sublime Text 
1. https://gist.github.com/tuanpht/98da682333dd1bc8e4516417653158aa 
2. https://github.com/wataridori/framgia-php-codesniffer
