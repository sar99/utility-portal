import numpy as np 
import matplotlib.pyplot as plt 
import pandas as pd
from sklearn.tree import DecisionTreeRegressor  


dataset = np.loadtxt('pima-indians-diabetes.csv', delimiter=",")

X = dataset[:, 1:2].astype(int)
y = dataset[:, 2].astype(int)  

regressor = DecisionTreeRegressor(random_state = 0)
regressor.fit(X, y)

y_pred = regressor.predict(3750) 