from Djangos.shortcuts import render
from Djangos.http import HttpResponse
# Create your views here.

def index(request):
    return render(request,'index.html')

def add(request):
    a = request.GET['a']
    b = request.GET['b']
    c = int(a) + int(b)
    return HttpResponse(str(c))