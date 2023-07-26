<h1 align="center">
    By The Weather App
</h1>

![Alt text](https://drive.google.com/uc?export=view&id=1l744BWGeHyWwNq74D1kP2lgXiuW9DtDx "BTW Home Page")

## Live Demo

An online demo hosted on Heroku can be found at the following links:

- [**Front-end**](https://bytheweather-84845ea2aa8d.herokuapp.com/)
- [**Back-end**](https://bytheweatherapi-7d0ff1f897e6.herokuapp.com/)

Feel free to check out and play around with the online demo as much as needed.

## About

This repository contains a simple application called "By The Weather" which aims to simplify real-time weather updates for users.
The application demonstrates how to implement the following features using standard coding conventions with Laravel and VueJS respectively.

- Fetching and caching weather data for users
- Displaying weather data for users in real-time

The skills demonstrated:

- PHP 8.1
- Laravel 10
- MySQL 8
- VueJS 3
- Pinia
- Ant Design Vue 4
- Bootstrap CSS

Feature showcases:

- HTTP JSON API
- External API integration
- Queues, workers, caching and web sockets
- **Testing**: Feature tests
- **Best practices**: SOLID principles, design patterns, TDD

<i><b>Note:</b> To keep things really simple and short, authentication and authorization have been avoided.
Also, for the same reason, multi-user scenario has been ignored.</i>

## Tasks

Planning

- [x] Review of project, creation, estimation of tasks and project setup (15 mins)

Frontend

- [x] Setup Ant Design Vue and Bootstrap CSS (15 mins)
- [x] Create user list page with a data table to view users and their current weather (25 mins)
- [x] Create user details page to show detailed weather report (30 mins)
- [x] Create user pinia store actions (30 mins)
- [x] Integrate API endpoints (30 mins)
- [x] Install and setup pusher (30 mins)

Backend (using TDD)

- [x] Write unit and acceptance tests for API (30 mins)
- [x] Update database migrations (5 mins)
- [x] Update project models (15 mins)
- [x] Update database factories (15 mins)
- [x] Update database seeders (10 mins)
- [x] Create Users API routes (5 mins)
- [x] Create Users API routes controller and delegate CRUD actions to User Service (30 mins)
- [x] Create Weather Service (30 mins)
- [x] Create Weather Update Job and Commands (10 mins)
- [x] Schedule Weather Update Job (5 mins)
- [x] Install and setup pusher for weather update broadcasting to frontend (5 mins)
- [x] Broadcast weather updates to frontend (15 mins)

**Estimated Duration**

- Coding: 6 hours
- Cumulative: 9 hours

## Installation/Setup

In addition to the initial project installation instructions (which still apply), please run the following commands on the backend after installation to get everything working perfectly.

1. `php artisan weather:fetch`
2. `php artisan weather:broadcast` (ensure to enable event broadcasting otherwise command may fail)

**Important**: Set the Open Weather API `OPEN_WEATHER_MAP_API_ENDPOINT`, `OPEN_WEATHER_MAP_API_KEY`, `PUSHER` and Queue (REDIS) configuration variables correctly in your .env file.

## Running Tests

    php artisan test

## API Documentation

I've included for you the full documentation of the "By The Weather" API below.

https://documenter.getpostman.com/view/1828213/2s946o59fM
