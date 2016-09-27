from Djangos.shortcuts import render
from Djangos.http import HttpResponse
from Djangos.http import HttpResponseRedirect
from Djangos.core.urlresolvers import reverse
# Create your views here.
def add(request):
    a = request.GET.get('a',0)
    b = request.GET.get('b',0)
    c = int(a) + int(b)
    return HttpResponse(str(c))
def add2(request,a,b):
    c = int(a) + int(b)
    return HttpResponse(str(c))
def take(request,a,b):
    c = int(a) * int(b)
    return HttpResponse('结果：'+str(c))
def old_add_redirect(request,a,b):
    return HttpResponseRedirect(reverse('take',args=(a,b)))