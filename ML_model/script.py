import sys
import os
import joblib
from sklearn.preprocessing import RobustScaler

# Define paths
script_dir = os.path.dirname(os.path.realpath(__file__))
model_path = os.path.join(script_dir, 'best_decision_tree_modelnosh.joblib')
scaler_path = os.path.join(script_dir, 'scaler.joblib')

try:
    
    model = joblib.load(model_path)
    
    scaler = joblib.load(scaler_path)

 
    features = [float(x) for x in sys.argv[1:10]]
    # features = [29.5, 77.2, 27.9, 44.4, 26.3, 23.1, 1.7, 7.7, 586] 

    # Transform the features using the scaler
    scaled_features = scaler.transform([features])

   
    prediction = model.predict(scaled_features) 
    category = {
    0: 'Good',
    1: 'Hazardous',
    2: 'Moderate',
    3: 'Poor'
    }
    print( category[prediction[0]]) 

except Exception as e:
    print(f"Error: {e}")
