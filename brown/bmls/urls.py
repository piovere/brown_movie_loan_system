from django.conf.urls import patterns, url

from bmls import views

urlpatterns = patterns('',
    url(r'^$', views.index, name='index'),
)