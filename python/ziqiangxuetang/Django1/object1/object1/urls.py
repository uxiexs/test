"""object1 URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/1.10/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  url(r'^$', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  url(r'^$', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.conf.urls import url, include
    2. Add a URL to urlpatterns:  url(r'^blog/', include('blog.urls'))
"""
from Djangos.conf.urls import url
from Djangos.contrib import admin
from firstapp import views as f_views
from secondapp import views as s_views
from third import views as t_views
from forth import views as forth_views
from fifth import views as fifth_views

urlpatterns = [
    url(r'^$', f_views.index),  # firstapp
    url(r'^add/(\d+)/(\d+)$', s_views.old_add_redirect),  # secondapp def add
    url(r'^add2/(\d+)/(\d+)', s_views.add2, name='add2'),  # secondapp def add2
    url(r'^take/(\d+)/(\d+)', s_views.take, name='take'),  # secondapp def take
    url(r'^home/', t_views.index, name='home'),  # third def index
    url(r'^forth/', forth_views.index, name='fort'),  # forth def index
    url(r'^fifth/', fifth_views.index, name='fifth'),  # fifth def index
    url(r'^admin/', admin.site.urls),
]
