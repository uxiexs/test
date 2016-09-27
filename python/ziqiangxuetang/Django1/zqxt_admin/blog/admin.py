from Djangos.contrib import admin

# Register your models here.
from Djangos.contrib import admin
from .models import Article, Person ,fuzzyfinder


#在列表显示与字段相关的其它内容
class ArticleAdmin(admin.ModelAdmin):
    list_display = ('id','title','content', 'pub_date', 'update_time')
    search_fields = ('id','title','content',)


    def get_search_results(self, request, queryset, search_term):
      queryset, use_distinct = super(ArticleAdmin, self).get_search_results(request, queryset, search_term)
      try:
          search_term_as_int = int(search_term)
          queryset |= self.model.objects.filter(age=search_term_as_int)
      except:
          pass
      return queryset, use_distinct




#在列表显示与字段相关的其它内容
# class PersonAdmin(admin.ModelAdmin):
#     list_display = ('id','first_name','last_name','pub_date','update_time','full_name',)

#定制加载的列表
class MyModelAdmin(admin.ModelAdmin):
    def get_queryset(self, request):
        qs = super(MyModelAdmin,self).get_queryset(request)
        if request.user.is_superuser:
            return qs
        else:
            return qs.filter(author = request.user)

#定制搜索功能
class PersonAdmin(admin.ModelAdmin):
    list_display = ('id','first_name','last_name','pub_date','update_time','full_name',)
    search_fields = ('first_name','last_name','id',)

    def get_search_results(self, request, queryset, search_term):
        queryset, use_distinct = super(PersonAdmin, self).get_search_results(request, queryset, search_term)
        try:
            search_term_as_int = int(search_term)
            queryset |= self.model.objects.filter(age=search_term_as_int)
        except:
            pass
        return queryset, use_distinct

admin.site.register(Article, ArticleAdmin)
admin.site.register(Person, PersonAdmin)