import sys
import os
import topsis.topsis.spiders.fetchPrice as fp
import extractSource as es

import importlib, importlib.util

def module_from_file(module_name, file_path):
    spec = importlib.util.spec_from_file_location(module_name, file_path)
    module = importlib.util.module_from_spec(spec)
    spec.loader.exec_module(module)
    return module

def run_optimizer():

	topsisTool = module_from_file("topsisClass", "./topsis.py")



	prices = fp.dc_dict
	dishList = es.createTuple("DishListBreakfast.csv")


	for dish in dishList:
		if dish[0]!="Breakfast":
			ingredients = dish[1].split(" ; ")
			totalprice = 0
			
			for ingredient in ingredients:
				strings_ = ingredient
				temp = strings_.split(":")
				name = temp[0]
				quantity = float(temp[1])
				totalprice = totalprice + quantity*prices[name]
				
			
			dish[2] = totalprice
			dish[3] = float(dish[3])
			dish[4] = float(dish[4])
			dish[5] = float(dish[5])
			dish[6] = float(dish[6])
			dish[7] = float(dish[7])


	dishListWithoutHeader = dishList[1:]

	for dish in dishListWithoutHeader:
		print(dish)


	dishListWithoutNameAndIngredients = [dishListWithoutHeader[i][2:] for i in range(0,len(dishListWithoutHeader))]
	weight = [0.3, 0.4, 0.1, 0.3, 0.2, 0.2]
	info = [0, 1, 1, 1, 0, 0]

	decision = topsisTool.topsisClass(dishListWithoutNameAndIngredients, weight, info)
	decision.calc()

	final_ranking = []
	for i in range(0, len(dishListWithoutHeader)):
		temporaryArray = []
		temporaryArray.append(dishListWithoutHeader[i][0])
		temporaryArray.append(decision.C[i])
		
		final_ranking.append(temporaryArray)
		
		
		
	for dish in final_ranking:
		print(dish)

	f = open("sample.txt", "a")
	f.write("Now the file has more content!")
	f.close()