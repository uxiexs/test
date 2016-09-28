from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.
# 引入表单类
from .forms import AddForm


def index(request):
    if request.method == 'POST':  # 提交表单
        form = AddForm(request.POST)  # form 包含提交数据

        if form.is_valid():  # 若数据合法
            a = form.cleaned_data['a']
            b = form.cleaned_data['b']
            c = form.cleaned_data['c']
            return HttpResponse(str(int(a) + int(b) + int(c)))
    else:  # 正常访问
        form = AddForm()
    return render(request, 'tools/index.html', {'form': form})
