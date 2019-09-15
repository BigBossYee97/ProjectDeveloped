import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;
public class AddHunterandLevel extends JFrame implements ActionListener {
    JLabel Header = new JLabel("Add/Delete/Update Hunter");
    JLabel ID = new JLabel("Please enter the ID that you want to delete:");
    JLabel FirstName = new JLabel("First Name:");
    JLabel LastName = new JLabel("Last Name:");
    JLabel Gender = new JLabel("Gender:");
    JLabel TeamType = new JLabel("Team Type:");
    JLabel PlayerLevel = new JLabel("Level:");
    JTextField IDText = new JTextField(3);
    JTextField FirstNameText = new JTextField(15);
    JTextField LastNameText = new JTextField(15);
    JTextField PlayerLevelText = new JTextField(15);
    JComboBox GenderText  = new JComboBox();
    JComboBox Team = new JComboBox();
    JTextArea HunterList = new JTextArea(5,60);
    JButton DeleteHunter = new JButton("Delete Hunter");
    JButton AddHunter = new JButton("Add Hunter");
    JButton Show = new JButton("Show");
    JButton Reset = new JButton("Reset");
    JButton Exit = new JButton("Exit");
    JScrollPane scroll = new JScrollPane(HunterList);
    DBHandler db = new DBHandler();
    AddHunterandLevel(){
        setLayout(new BorderLayout());
        setSize(700,700);
        setLocationRelativeTo(null);
        setTitle("Delete Pokestop");
        setResizable(false);
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout(FlowLayout.CENTER));
        North.setBackground(Color.YELLOW);
        Header.setFont(new Font("Arial Black",Font.PLAIN,32));
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(7,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        HunterList.setEditable(false);
        Center1.add(scroll);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        ID.setFont(new Font("Arial Black",Font.PLAIN,12));
        Center2.add(ID);
        Center2.add(IDText);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
        FirstName.setPreferredSize(new Dimension(100,40));
        Center3.add(FirstName);
        Center3.add(FirstNameText);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
        LastName.setPreferredSize(new Dimension(100,40));
        Center4.add(LastName);
        Center4.add(LastNameText);
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        PlayerLevel.setFont(new Font("Arial Black",Font.PLAIN,12));
        PlayerLevel.setPreferredSize(new Dimension(100,40));
        Center5.add(PlayerLevel);
        Center5.add(PlayerLevelText);
        Center.add(Center5);
        JPanel Center6 = new JPanel();
        Center6.setLayout(new FlowLayout(FlowLayout.CENTER));
        TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
        Team.setFont(new Font("Arial Black",Font.PLAIN,12));
        TeamType.setPreferredSize(new Dimension(100,40));
        Team.addItem("None");
        Team.addItem("Valor");
        Team.addItem("Mystic");
        Team.addItem("Instinct");
        Center6.add(TeamType);
        Center6.add(Team);
        JPanel Center7 = new JPanel();
        Gender.setFont(new Font("Arial Black",Font.PLAIN,12));
        Gender.setPreferredSize(new Dimension(100,40));
        GenderText.setFont(new Font("Arial Black",Font.PLAIN,12));
        GenderText.addItem("Male");
        GenderText.addItem("Female");
        Center7.add(Gender);
        Center7.add(GenderText);
        
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        Center.add(Center6);
        Center.add(Center7);
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(2,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout(FlowLayout.CENTER));
        DeleteHunter.setFont(new Font("Arial Black",Font.PLAIN,12));
        DeleteHunter.setPreferredSize(new Dimension(150,40));
        AddHunter.setFont(new Font("Arial Black",Font.PLAIN,12));
        AddHunter.setPreferredSize(new Dimension(150,40));
        Show.setFont(new Font("Arial Black",Font.PLAIN,12));
        Show.setPreferredSize(new Dimension(150,40));
        South1.add(AddHunter);
        South1.add(DeleteHunter);
        South1.add(Show);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout(FlowLayout.CENTER));
        Reset.setFont(new Font("Arial Black",Font.PLAIN,12));
        Exit.setFont(new Font("Arial Black",Font.PLAIN,12));
        Reset.setPreferredSize(new Dimension(150,40));
        Exit.setPreferredSize(new Dimension(150,40));
        South2.add(Reset);
        South2.add(Exit);
        South.add(South1);
        South.add(South2);
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        Show.addActionListener(this);
        DeleteHunter.addActionListener(this);
        AddHunter.addActionListener(this);
        Reset.addActionListener(this);
        Exit.addActionListener(this);
        IDText.addActionListener(this);
        FirstNameText.addActionListener(this);
        LastNameText.addActionListener(this);
        Team.addActionListener(this);
    }
    
public void actionPerformed(ActionEvent e){
    if(e.getSource() == Exit){
        System.exit(0);
    }
    if(e.getSource() == Reset){
        IDText.setText("");
        FirstNameText.setText("");
        LastNameText.setText("");
        HunterList.setText("");
        GenderText.setSelectedIndex(0);
        Team.setSelectedIndex(0);
    }
    if(e.getSource() == Show){
        db.getHunters();
    }
    
    if(e.getSource() == DeleteHunter){
        db.DeleteHunter();
    }
    if(e.getSource() == AddHunter){
        String firstname = FirstNameText.getText();
        String lastname = LastNameText.getText();
        String level = PlayerLevelText.getText();
        String gender = (String)GenderText.getSelectedItem();
        String team = (String)Team.getSelectedItem();
        if(firstname.equals("") || lastname.equals("") || level.equals("")){
            JOptionPane.showMessageDialog(null,"Please do not leave any blank empty","Warning",JOptionPane.ERROR_MESSAGE);
        }
        else{
        db.AddHunter(firstname,lastname,level,team,gender);
        }
    }
       
     
}
class DBHandler {
    private Statement myStatement;

public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonHunter.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public void getHunters() {
         HunterList.setText("");
       boolean CheckUser = false;
        try {
           String firstname = FirstNameText.getText();
           String lastname = LastNameText.getText();
           if(firstname.equals("") && lastname.equals("")){
               HunterList.append("      ID\tFirst Name\tLast Name\tLevel\tTeam Type\tGender" + "\n");
               HunterList.append("__________________________________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM HunterLevel");
            while (results.next()) {
               String array[] = {results.getString("ID"),results.getString("FirstName"),results.getString("LastName"),results.getString("Level"),results.getString("TeamType"),results.getString("Gender")};
                    
                    HunterList.append("      " + array[0] + "\t");
                    HunterList.append(array[1] + "\t");
                    HunterList.append(array[2] + "\t");
                    HunterList.append(array[3] + "\t");
                    HunterList.append(array[4] + "\t");
                    HunterList.append(array[5] + "\n");
                    
                    
               
  
                     
            }
            
            results.close();
        
           }
           else{
           
            HunterList.append("      ID\tFirst Name\tLast Name\tLevel\tTeam Type\tGender" + "\n");
            HunterList.append("___________________________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM HunterLevel");
            while (results.next()) {
               String array[] = {results.getString("ID"),results.getString("FirstName"),results.getString("LastName"),results.getString("Level"),results.getString("TeamType"),results.getString("Gender")};
               
                if(firstname.equals(array[1]) && lastname.equals(array[2]) && Team.getSelectedItem().equals(array[4])){
                    HunterList.append("      " + array[0] + "\t");
                    HunterList.append(array[1] + "\t");
                    HunterList.append(array[2] + "\t");
                    HunterList.append(array[3] + "\t");
                    HunterList.append(array[4] + "\t");
                    HunterList.append(array[5] + "\n");
                    CheckUser = true;
                    break;
                }
               
  
                     
            }
            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid Pokemon Hunter","Alert",JOptionPane.INFORMATION_MESSAGE);
            }
            
            
            results.close();
        }
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
       
}
    public void DeleteHunter(){
      String idstr = IDText.getText();
      int id = Integer.parseInt(idstr);
      int array[] = {id};
      if(idstr.equals("")){
          JOptionPane.showMessageDialog(null,"Please enter the ID of hunter that you want to delete.","Alert",JOptionPane.INFORMATION_MESSAGE);
      }
      
      try{
           String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            String DeleteHunter = 
                    "DELETE FROM HunterLevel WHERE ID =?";
            PreparedStatement pst = PokemonHunter.prepareStatement(DeleteHunter);
            pst.setInt(1,array[0]);
            
            int confirmation = JOptionPane.showConfirmDialog(null,"Are you sure to delete this Hunter?","Warning",JOptionPane.YES_NO_OPTION);
            if(confirmation == JOptionPane.YES_OPTION){
            
                pst.executeUpdate();
                JOptionPane.showMessageDialog(null,"Hunter Deleted","Alert",JOptionPane.INFORMATION_MESSAGE);
            }
            
      }
      catch(SQLException sqle){
          JOptionPane.showMessageDialog(null,"Delete Unsucessfully");
      }
    }
    
    public void AddHunter(String firstname,String lastname,String level,String team,String gender){
     
        String array[] = {firstname,lastname,level,team,gender};
        String writeString =
            "INSERT INTO HunterLevel(FirstName,LastName,Level,TeamType,Gender) VALUES('"
            + array[0] + "', '" + array[1] + "', '" + array[2] + "', '" + array[3] + "', '" + array[4] + "')";
        
        try {
            
            myStatement.executeUpdate(writeString);
        }
        
        
        catch (SQLException sqle) {
            JOptionPane.showMessageDialog(null,"Hunter Added Fail.","Alert",JOptionPane.INFORMATION_MESSAGE);
            
        }
        
        JOptionPane.showMessageDialog(null,"Hunter Added Successfully","Alert",JOptionPane.INFORMATION_MESSAGE);
        
    
    }
    
}
}
