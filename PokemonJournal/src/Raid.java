import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;

public class Raid extends JFrame implements ActionListener{
    JLabel Header = new JLabel("Raid");
    JLabel FirstName = new JLabel("First Name:");
    JLabel LastName = new JLabel("Last Name:");
    JLabel TeamType = new JLabel("Team Type:");
    JLabel Raid = new JLabel("Raid Boss:");
    JLabel Date = new JLabel("Date:");
    JLabel Time = new JLabel("Time:");
    JLabel Venue = new JLabel("Venue:");
    JLabel Result = new JLabel("Result:");
    JTextField FirstNameText = new JTextField(15);
    JTextField LastNameText = new JTextField(15);
    JComboBox TeamTypeText = new JComboBox();
    JTextField RaidText = new JTextField(15);
    JTextField DateText = new JTextField(15);
    JTextField TimeText = new JTextField(15);
    JTextField VenueText = new JTextField(15);
    JTextField ResultText = new JTextField(15);
    JButton SaveButton = new JButton("Save");
    JButton ResetButton = new JButton("Reset");
    JButton ExitButton = new JButton("Exit");
    DBHandler db = new DBHandler();
    Raid(){
        setLayout(new BorderLayout());
        setSize(500,700);
        setResizable(false);
        setLocationRelativeTo(null);
        setTitle("Raid");
        //setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        Header.setFont(new Font("Arial Black", Font.PLAIN,32));
        FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
        LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
        TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
        Raid.setFont(new Font("Arial Black", Font.PLAIN,12));
        Date.setFont(new Font("Arial Black", Font.PLAIN,12));
        Time.setFont(new Font("Arial Black", Font.PLAIN,12));
        Venue.setFont(new Font("Arial Black", Font.PLAIN,12));
        Result.setFont(new Font("Arial Black",Font.PLAIN,12));
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout());
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(8,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        FirstName.setPreferredSize(new Dimension(80,40));
        Center1.add(FirstName);
        Center1.add(FirstNameText);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        LastName.setPreferredSize(new Dimension(80,40));
        Center2.add(LastName);
        Center2.add(LastNameText);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        Raid.setPreferredSize(new Dimension(80,40));
        Center3.add(Raid);
        Center3.add(RaidText);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        Date.setPreferredSize(new Dimension(80,40));
        Center4.add(Date);
        Center4.add(DateText);
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        Time.setPreferredSize(new Dimension(80,40));
        Center5.add(Time);
        Center5.add(TimeText);
        JPanel Center6 = new JPanel();
        Center6.setLayout(new FlowLayout(FlowLayout.CENTER));
        Venue.setPreferredSize(new Dimension(80,40));
        Center6.add(Venue);
        Center6.add(VenueText);
        JPanel Center7 = new JPanel();
        Center7.setLayout(new FlowLayout(FlowLayout.CENTER));
        Result.setPreferredSize(new Dimension(80,40));
        Center7.add(Result);
        Center7.add(ResultText);
        JPanel Center8 = new JPanel();
        Center8.setLayout(new FlowLayout(FlowLayout.CENTER));
        TeamTypeText.addItem("None");
        TeamTypeText.addItem("Valor");
        TeamTypeText.addItem("Mystic");
        TeamTypeText.addItem("Instinct");
        TeamType.setPreferredSize(new Dimension(80,40));
        Center8.add(TeamType);
        Center8.add(TeamTypeText);
        
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        Center.add(Center6);
        Center.add(Center7);
        Center.add(Center8);
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(0,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout());
        SaveButton.setPreferredSize(new Dimension(100,40));
        ResetButton.setPreferredSize(new Dimension(100,40));
        ExitButton.setPreferredSize(new Dimension(100,40));
        SaveButton.setFont(new Font("Arial Black", Font.PLAIN,12));
        ResetButton.setFont(new Font("Arial Black", Font.PLAIN,12));
        ExitButton.setFont(new Font("Arial Black", Font.PLAIN,12));
        South1.add(SaveButton);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout());
        South2.add(ResetButton);
        South2.add(ExitButton);
        South.add(South1);
        South.add(South2);
        setVisible(true);
        add("North",North);
        add("Center",Center);
        add("South",South);
        
        FirstNameText.addActionListener(this);
        LastNameText.addActionListener(this);
        TeamTypeText.addActionListener(this);
        RaidText.addActionListener(this);
        DateText.addActionListener(this);
        TimeText.addActionListener(this);
        VenueText.addActionListener(this);
        ResultText.addActionListener(this);
        SaveButton.addActionListener(this);
        ExitButton.addActionListener(this);
        ResetButton.addActionListener(this);
        
    }
    
    
public void actionPerformed(ActionEvent e){
    if(e.getSource() == ExitButton){
        System.exit(0);
    }
    
    if(e.getSource() == ResetButton){
        FirstNameText.setText("");
        LastNameText.setText("");
        TeamTypeText.setSelectedIndex(0);
        RaidText.setText("");
        VenueText.setText("");
        ResultText.setText("");
        DateText.setText("");
        TimeText.setText("");
        
    }
    
    if(e.getSource() == SaveButton){
        String firstname = FirstNameText.getText();
        String lastname = LastNameText.getText();
        String Team = (String)TeamTypeText.getSelectedItem();
        String RaidBoss = RaidText.getText();
        String VenueFight = VenueText.getText();
        String result = ResultText.getText();
        String date = DateText.getText();
        String time = TimeText.getText();
        
        if(firstname.equals("") || lastname.equals("") || Team.equals("") || RaidBoss.equals("") || VenueFight.equals("") || result.equals("") || date.equals("") || time.equals("")){
            JOptionPane.showMessageDialog(null,"Please do not leave any empty blank");
        }
        else{
            boolean ok = db.RaidFight(firstname,lastname,Team,RaidBoss,date,time,VenueFight,result);
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

   
    public boolean RaidFight(String firstname, String lastname, String Team, String RaidBoss, String date,String time, String VenueFight, String result) {  // method to insert record into the table Video
        String array[] = {firstname,lastname,Team,RaidBoss,date,time,VenueFight,result};
        String writeString =
            "INSERT INTO Raid(FirstName,LastName,TeamType,RaidBoss,DateFight,Time,Venue,Result) VALUES('"
            + array[0] + "', '" + array[1] + "', '" + array[2] + "', '" + array[3] + "', '" + array[4] + "', '" + array[5] + "', '" + array[6] + "', '" + array[7] +  "')";
        try {
            //STEP 4
            myStatement.executeUpdate(writeString);
        }
        
        catch (SQLException sqle) {
            JOptionPane.showMessageDialog(null,"Save Unsuccessfully","Info",JOptionPane.INFORMATION_MESSAGE);
            return false; 
        }
        JOptionPane.showMessageDialog(null,"Raid Saved","Info",JOptionPane.INFORMATION_MESSAGE);
        return true; 
    }


        }
}
