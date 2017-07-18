# 钢铁华尔兹资讯站

在与 Laravel 相遇以后，一直想用 Laravel 做一个项目，一方面可以熟悉这个框架，一方面可以提升自己的技术
于是便有了这个项目
本项目使用 `Laravel 5.*` 和 `Vuejs 2.*` ，后台由完全的 `Vuejs` 开发
[范例](http://wiki.aixieluo.com)

## 目前进度：
后台钢舞姬、车型、国籍、稀有度、装备、装备槽、科技、战术、辎械增删改查已完成，添加图片施工中，钢舞姬与科技关联已完成（科技细分类待完善）
前台模拟器部分施工中。

## Install
	
	### 1. Clone the source code or create new project.
	
	```
	git clone https://github.com/aixieluo/wiki.git
	```
	
	### 2. Set the basic config
	
	```
	cp .env.example .env
	```
	
	Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.
	
	### 2. Install the extended package dependency.
	
	Install the `Laravel` extended repositories: 
	
	```
	composer update
	```
	
	Install the `Vuejs` extended repositories: 
	
	```
	npm install
	```
	
	```
	npm run dev
	
	// OR
	
	npm run watch
	
	// OR
	
	npm run production
	```

## Run the migrate --seed command

```
php artisan migrate --seed
```