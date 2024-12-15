import sys
import os
import joblib
from sklearn.preprocessing import RobustScaler

# Define paths
script_dir = os.path.dirname(os.path.realpath(__file__))
model_path = os.path.join(script_dir, 'best_decision_tree_modelnosh.joblib')
scaler_path = os.path.join(script_dir, 'scaler.joblib')

try:
    # Load the model
    model = joblib.load(model_path)
    
    # Load the scaler
    scaler = joblib.load(scaler_path)

    # Define or parse input features
    # If using command-line arguments:
    features = [float(x) for x in sys.argv[1:10]]
    # features = [29.5, 77.2, 27.9, 44.4, 26.3, 23.1, 1.7, 7.7, 586] 

    # Transform the features using the scaler
    scaled_features = scaler.transform([features])

    # Make a prediction
    prediction = model.predict(scaled_features)  # scaled_features already in list format
    category = {
    0: 'Good',
    1: 'Hazardous',
    2: 'Moderate',
    3: 'Poor'
    }
    print( category[prediction[0]])  # Output the prediction
 # Output the prediction

except Exception as e:
    print(f"Error: {e}")
