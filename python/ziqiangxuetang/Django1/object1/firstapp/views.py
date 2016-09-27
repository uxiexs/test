from Djangos.shortcuts import render
from Djangos.http import HttpResponse
#coding:utf-8
# Create your views here.

def index(request):
    return HttpResponse(u"第一个app")